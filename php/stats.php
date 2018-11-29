<?php
    /*
     * $Id: stats.php 1439 2009-11-17 23:31:04Z dmorton $
     *
     * MAIA MAILGUARD LICENSE v.1.0
     *
     * Copyright 2004 by Robert LeBlanc <rjl@renaissoft.com>
     *                   David Morton   <mortonda@dgrmm.net>
     * All rights reserved.
     *
     * PREAMBLE
     *
     * This License is designed for users of Maia Mailguard
     * ("the Software") who wish to support the Maia Mailguard project by
     * leaving "Maia Mailguard" branding information in the HTML output
     * of the pages generated by the Software, and providing links back
     * to the Maia Mailguard home page.  Users who wish to remove this
     * branding information should contact the copyright owner to obtain
     * a Rebranding License.
     *
     * DEFINITION OF TERMS
     *
     * The "Software" refers to Maia Mailguard, including all of the
     * associated PHP, Perl, and SQL scripts, documentation files, graphic
     * icons and logo images.
     *
     * GRANT OF LICENSE
     *
     * Redistribution and use in source and binary forms, with or without
     * modification, are permitted provided that the following conditions
     * are met:
     *
     * 1. Redistributions of source code must retain the above copyright
     *    notice, this list of conditions and the following disclaimer.
     *
     * 2. Redistributions in binary form must reproduce the above copyright
     *    notice, this list of conditions and the following disclaimer in the
     *    documentation and/or other materials provided with the distribution.
     *
     * 3. The end-user documentation included with the redistribution, if
     *    any, must include the following acknowledgment:
     *
     *    "This product includes software developed by Robert LeBlanc
     *    <rjl@renaissoft.com>."
     *
     *    Alternately, this acknowledgment may appear in the software itself,
     *    if and wherever such third-party acknowledgments normally appear.
     *
     * 4. At least one of the following branding conventions must be used:
     *
     *    a. The Maia Mailguard logo appears in the page-top banner of
     *       all HTML output pages in an unmodified form, and links
     *       directly to the Maia Mailguard home page; or
     *
     *    b. The "Powered by Maia Mailguard" graphic appears in the HTML
     *       output of all gateway pages that lead to this software,
     *       linking directly to the Maia Mailguard home page; or
     *
     *    c. A separate Rebranding License is obtained from the copyright
     *       owner, exempting the Licensee from 4(a) and 4(b), subject to
     *       the additional conditions laid out in that license document.
     *
     * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER AND CONTRIBUTORS
     * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
     * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
     * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
     * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
     * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
     * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS
     * OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
     * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR
     * TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE
     * USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
     *
     */

    require_once ("core.php");
    require_once ("maia_db.php");
    require_once ("authcheck.php");
    require_once ("display.php");
    $display_language = get_display_language($euid);
    require_once ("./locale/$display_language/db.php");
    require_once ("./locale/$display_language/display.php");
    require_once ("./locale/$display_language/stats.php");

    require_once ("smarty.php");

    if (isset($_GET["id"])) {
        $id = trim($_GET["id"]);
        if (($id != 0) && (!is_an_administrator($uid))) {
            $id = $euid;
        }
    } else {
        $id = $euid;
    }
    $smarty->assign("user_id", $id);

    $select = "SELECT currency_label, enable_false_negative_management, " .
              "enable_virus_scanning, enable_spam_filtering, " .
              "enable_bad_header_checking, enable_banned_files_checking, enable_charts " .
              "FROM maia_config WHERE id = 0";
    $sth = $dbh->prepare($select);
    $res = $sth->execute();
    if (PEAR::isError($sth)) {  
        die($sth->getMessage());  
    } 

    if ($row = $res->fetchrow()) {
        $currency_label = $row["currency_label"];
        $enable_false_negative_management = ($row["enable_false_negative_management"] == 'Y');
        $enable_virus_scanning = ($row["enable_virus_scanning"] == 'Y');
        $enable_spam_filtering = ($row["enable_spam_filtering"] == 'Y');
        $enable_bad_header_checking = ($row["enable_bad_header_checking"] == 'Y');
        $enable_banned_files_checking = ($row["enable_banned_files_checking"] == 'Y');
        $enable_charts = ($row["enable_charts"] == 'Y');
    }
    $sth->free();
    
    if ($enable_charts) {
      $select = "SELECT charts FROM maia_users WHERE id=?";
      $sth = $dbh->prepare($select);
      $res = $sth->execute($euid);
      if (PEAR::isError($sth)) {  
          die($sth->getMessage());  
      } 

      if ($row = $res->fetchrow()) {
        $enable_charts = ($row["charts"] == 'Y');
      }
      $sth->free();
    }

    update_mail_stats($id, "suspected_ham");
    update_mail_stats($id, "suspected_spam");

    $showmail = ok_to_impersonate($euid, $uid);

    if ($id > 0) {
        $header = sprintf($lang['header_user'], get_user_name($id));
    } else {
        $header = $lang['header_systemwide'];
    }
    $smarty->assign("header", $header);
    $smarty->assign("currency_label", $currency_label);
    $smarty->assign("is_a_visitor", false);
    $smarty->assign("msid", $msid);
    $smarty->assign("sid", $sid);
    $smarty->assign("enable_virus_scanning", $enable_virus_scanning);
    $smarty->assign("enable_spam_filtering", $enable_spam_filtering);
    $smarty->assign("enable_charts", $enable_charts);
//    $smarty->assign("showmail", $showmail);

    list($ppv_pct, $npv_pct, $sensitivity_pct, $specificity_pct, $efficiency_pct, $fp_pct, $fn_pct) = get_filter_stats($id);
    $smarty->assign("ppv_pct", $ppv_pct);
    $smarty->assign("npv_pct", $npv_pct);
    $smarty->assign("sensitivity_pct", $sensitivity_pct);
    $smarty->assign("specificity_pct", $specificity_pct);
    $smarty->assign("eff_pct", $efficiency_pct);
    $smarty->assign("fp_pct", $fp_pct);
    $smarty->assign("fn_pct", $fn_pct);

    $data = array();
    if ($enable_spam_filtering && $enable_false_negative_management) {
        $data['suspected_ham'] = get_item_row($id, 'suspected_ham');
    }
    $data['ham'] = get_item_row($id, 'ham');
    if ($enable_spam_filtering) {
        $data['fp'] = get_item_row($id, "fp");
        $data['suspected_spam'] = get_item_row($id, "suspected_spam");
        $data['spam'] = get_item_row($id, "spam");
        if ($enable_false_negative_management) {
            $data['fn'] = get_item_row($id, "fn");
        }
    }
    $data['wl'] = get_item_row($id, "wl");
    $data['bl'] = get_item_row($id, "bl");
    if ($enable_virus_scanning) {
        $data['virus'] = get_item_row($id, "virus");
    }
    if ($enable_banned_files_checking) {
        $data['banned_file'] = get_item_row($id, "banned_file");
    }
    if ($enable_bad_header_checking) {
        $data['bad_header'] = get_item_row($id, "bad_header");
    }
    $data['oversized'] = get_item_row($id, "oversized");
 
    $links = array( 'suspected_ham'   => "ham",
                    'suspected_spam'    => "spam",
                    'virus' => "virus",
                    'banned_file' =>    "attachment",
                    'bad_header'    => "header",
                    'ham' => false,  // these false values are here to
                    'bl' => false,   // prevent smarty from issueing 
                    'fp' => false,   // warnings for undefined indices.
                    'spam' => false, // I wish smarty would be smarter about this. :(
                    'fn' => false,
                    'wl' => false,
                    'oversized' => false
                    
                    );
    $smarty->assign('links', $links);
    
    
    $smarty->assign('data', $data);

    $smarty->display("stats.tpl");

   /*
    * get_item_row(): Produces a row of statistics about mail items
    *                     of the specified type received by the specified
    *                     user, or all users if $user_id == 0.
    */
   function get_item_row($user_id, $type)
   {
       global $dbh;
       global $lang;

       $bandwidth_cost = get_config_value("bandwidth_cost");
       $items = count_items($user_id, $type);

       if ($items > 0) {
           $ret = array();
           $ret['items'] = $items;
           $total_mail = count_total_mail($user_id);
           if ($total_mail > 0) {
               $ret['pct'] = sprintf("%.1f%%", 100 * $items / $total_mail);
           } else {
       	       $ret['pct'] = "0.0%";
           }
           $item_size = total_item_size($user_id, $type);
           $item_days = count_item_days($user_id, $type);
           if ($item_days > 0) {
               if ($item_days >= 1) {
                   $ret['rate'] = sprintf("%.1f", $items / $item_days);
                   $bandwidth_per_day = $item_size / $item_days;
               } else {
                   $ret['rate'] = $items;
                   $bandwidth_per_day = $item_size;
               }
           } else {
       	       $ret['rate'] = "-";
       	       $bandwidth_per_day = 0;
           }
           if ($type == "ham" || $type == "spam" || $type == "suspected_spam" || $type == "suspected_ham" || $type == "fp" || $type == "fn") {
               $ret['minscore'] = sprintf("%.3f", lowest_item_score($user_id, $type));
               $ret['maxscore'] = sprintf("%.3f", highest_item_score($user_id, $type));
               $ret['avgscore'] = sprintf("%.3f", total_item_score($user_id, $type) / $items);
           } else {
	          $ret['minscore'] = "-";
	          $ret['maxscore'] = "-";
	          $ret['avgscore'] = "-";
           }
           $ret['minsize'] = sprintf("%.1f", smallest_item_size($user_id, $type) / KILOBYTE);
           $ret['maxsize'] = sprintf("%.1f", largest_item_size($user_id, $type) / KILOBYTE);
           $ret['avgsize'] = sprintf("%.1f", $item_size / $items / KILOBYTE);
           if ($bandwidth_per_day > 0) {
               $ret['bandwidth'] = sprintf("%.2f", $bandwidth_per_day / MEGABYTE);
           } else {
      	       $ret['bandwidth'] = "-";
           }
           $ret['cost'] = sprintf("%.3f", $bandwidth_cost * $bandwidth_per_day / GIGABYTE);
       } else {
           $ret = array(
              'items' => "-",
              'rate' => "-",
              'minscore' => "-",
              'maxscore' => "-",
              'avgscore' => "-",
              'minsize' => "-",
              'maxsize' => "-",
              'avgsize' => "-",
              'bandwidth' => "-",
              'cost' => "-",
              'pct' => "-"
           );
       }
       return $ret;
   }
?>
