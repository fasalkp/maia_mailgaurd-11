<?php
    /*
     * $Id: list-cache.php 1439 2009-11-17 23:31:04Z dmorton $
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
    require_once ("authcheck.php");
    require_once ("maia_db.php");
    require_once ("display.php");
    require_once ("mime.php");
    $display_language = get_display_language($euid);
    require_once ("./locale/$display_language/db.php");
    require_once ("./locale/$display_language/display.php");
    require_once ("./locale/$display_language/smtp.php");
    require_once ("./locale/$display_language/mime.php");
    require_once ("./locale/$display_language/reportspam.php");
    require_once ("./locale/$display_language/quarantine.php");
    require_once ("./locale/$display_language/viewmail.php");
    require_once ("./locale/$display_language/listcache.php");
    
    require_once ("smarty.php");
    
    require_once ("cache.php");
    
    // Admins (including the superadmin) should not be looking at
    // other people's mail!
    if (!ok_to_impersonate($euid, $uid)) {
        header("Location: stats.php" . $sid);
        exit;
    }
    
    // Establish which type of cache we are looking at
    if (isset($_GET["cache_type"])) {
        $cache_type = $_GET["cache_type"];  //FIXME need to check incoming data
    } else {
        header("Location: list-cache.php" . $msid . "cache_type=ham");
        exit;
    }
    $dbtype = get_database_type($dbh);
    $cache = new MessageCache($cache_type, $dbh, $dbtype, $smarty);
    
    if (isset($_POST["submit"])) {
        $message = $cache->confirm_cache($euid);
        $_SESSION["message"] = $message;
        header("Location: list-cache.php" . $msid . "cache_type=$cache_type");
        exit;
    }
    
    //redirect if we are setting new search order
    if (isset($_GET["sort"])) {
         $cache->set_sort_order($_GET["sort"], $euid, $msid);
         // function does not return - page redirects
    }

    $offset = $cache->get_offset();
   

   /*notes about caches
   spam and ham have opposite sort orders for score
   attachment, virus, and headers do not show the score.
   different named variables once existed, depending on action: 
     spam -> rescued/confirmed/deleted
     ham -> confirmed/reported/deleted
     attachment/virus/header -> rescue/delete
   
   
   */
   
    
    $cache->get_sort_order($euid);
	
    // Get a list of all the suspected (H)am items with this user's
    // ID in the recipient list, and sort it in ascending
    // order by spam score.
    $cache->set_select();

    $cache->render($euid);
    //print_r($_POST);

?>
