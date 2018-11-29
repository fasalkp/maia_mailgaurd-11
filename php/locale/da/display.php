<?php
    /*
     * $Id$
     *
     * MAIA MAILGUARD LICENSE v.1.0
     *
     * Copyright 2004 by Robert LeBlanc <rjl@renaissoft.com>
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
     * associated PHP, Perl, and SQL scripts, documentation fils, graphic
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

    // Menu emails
    $lang['menu_welcome'] = "Velkommen";
    $lang['menu_stats'] =  "Statistikker";
    $lang['menu_settings'] =  "Indstillinger";
    $lang['menu_whiteblacklist'] =  "Godkente/Blokerede Lister";
    $lang['menu_quarantine'] =  "Karantæne";
    $lang['menu_report'] =  "Rapporter Spam";
    $lang['menu_admin'] =  "Admin";
    $lang['menu_help'] =  "Hjælp";
    $lang['menu_logout'] =  "Log af";

    // Text messages
    $lang['text_version'] =  "Version";
    $lang['text_all_users'] =  "alle brugere";
    $lang['text_day'] =  "dag";
    $lang['text_efficiency'] =  "Effektivitet";
    $lang['text_sensitivity'] =  "Følsomhed";
    $lang['text_specificity'] =  "Specifiktivitet";
    $lang['text_ppv'] =  "PPV";
    $lang['text_npv'] =  "NPV";
    $lang['text_falske_positive'] =  "Falske positiver";
    $lang['text_falske_negative'] =  "Falske negativer";
    $lang['powered_by'] = "Powered by Maia Mailguard - http://www.maiamailguard.com";
    
    $lang['text_truncate_subject'] = "Trim ikke-email linier til: (karaktere)";
    $lang['text_truncate_email'] = "Trim email linier til: (karaktere)";

    // Links
    $lang['link_systemwide'] =  "Vis statistikker for hele mailsystemet";
    $lang['link_personal'] =  "Vis dine personlige statistikker";
    $lang['link_viruses'] =  "Vis virus statistikker";
    $lang['link_rules'] =  "Vis SpamAssassin regel statistikker";

    // Table headers
    $lang['header_score'] =  "Score";
    $lang['header_count'] =  "Antal";
    $lang['header_størrelse'] =  "Størrelse";
    $lang['header_min'] =  "Min";
    $lang['header_max'] =  "Maks";
    $lang['header_average'] =  "Gennemsnit";
    $lang['header_båndbredde'] =  "Båndbredde";
    $lang['header_percent'] =  "Pct";
    $lang['header_pris'] =  "Pris";
    $lang['header_emails'] =  "Antal";
    $lang['header_type'] =  "Mail Type";
    $lang['header_user'] =  "Statistikker for bruger: %s";
    $lang['header_systemwide'] =  "Statistikker for alle brugere";
    $lang['header_spam_score'] =  "Score";
    $lang['header_rule_triggered'] =  "Regel benyttet";
    $lang['header_explanation'] =  "Forklaring";

    $lang['array_header'] =  array("ham"            => "Bekræftet ikke-spam",
                                      "formodet_ham"  => "Ubekræftet ikke-spam",
                                      "formodet_spam" => "Formodet spam",
                                      "spam"           => "Bekræftet spam",
                                      "virus"          => "Virus/Skadelig software",
                                      "fp"             => "Falske Positiver",
                                      "fn"             => "Falske Negativer",
                                      "wl"             => "Godkendte afsendere",
                                      "bl"             => "Blokerede afsendere",
                                      "bad_header"     => "Ukorrekte mail headers",
                                      "blokerede_fil"    => "Blokerede filvedhæng",
                                      "for store"       => "For store emails");

    $lang['array_count'] =  array("ham"            => "Bekræftet ikke-spam modtaget",
                                      "formodet_ham"  => "Ubekræftet ikke-spam modtaget",
                                      "formodet_spam" => "Formodet spam i karantæne",
                                      "spam"           => "Bekræftet spam modtaget",
                                      "virus"          => "Vira modtaget",
                                      "fp"             => "Emails fejlmarkeret som spam",
                                      "fn"             => "Emails fejlmarkeret som ikke-spam",
                                      "wl"             => "Emails modtaget fra godkendte afsendere",
                                      "bl"             => "Emails modtaget fra blokerede afsendere",
                                      "bad_header"     => "Emails med ukorrekte mail headers",
                                      "blokerede_fil"    => "Emails med blokerede filvedhæng",
                                      "for store"      => "Emails for store til scanning");

    $lang['array_arrivals'] =  array("ham"            => "Ikke-spam modtaget",
                                      "formodet_ham"  => "Ubekræftet ikke-spam modtaget",
                                      "formodet_spam" => "Formodet spam modtaget",
                                      "spam"           => "Bekræftet spam modtaget",
                                      "virus"          => "Vira modtaget",
                                      "fp"             => "Falske positive fejl",
                                      "fn"             => "Falske negative fejl",
                                      "wl"             => "Godkendte emails modtaget",
                                      "bl"             => "Blokerede emails modtaget",
                                      "bad_header"     => "Ukorrekte headere modtaget",
                                      "blokerede_fil"    => "Blokerede filvedhæng modtaget",
                                      "for store"      => "For store emails modtaget");

    $lang['array_highest_score'] =  array("ham"            => "Højeste ikke-spam score",
                                      "formodet_ham"  => "Højeste ubekræftet ikke-spam score",
                                      "formodet_spam" => "Højeste formodet spam score",
                                      "spam"           => "Højeste spam score",
                                      "virus"          => "",
                                      "fp"             => "Højeste falske posivie score",
                                      "fn"             => "Højeste falske negative score",
                                      "wl"             => "",
                                      "bl"             => "",
                                      "bad_header"     => "",
                                      "blokerede_fil"    => "",
                                      "for store"      => "");

    $lang['array_lowest_score'] =  array("ham"            => "Laveste ikke-spam score",
                                      "formodet_ham"  => "Laveste ubekræftet ikke-spam score",
                                      "formodet_spam" => "Laveste formodet spam score",
                                      "spam"           => "Laveste spam score",
                                      "virus"          => "",
                                      "fp"             => "Laveste falske positive score",
                                      "fn"             => "Laveste falske negative score",
                                      "wl"             => "",
                                      "bl"             => "",
                                      "bad_header"     => "",
                                      "blokerede_fil"    => "",
                                      "for store"      => "");

    $lang['array_average_score'] =  array("ham"            => "Gennemsnitlige ikke-spam score",
                                      "formodet_ham"  => "Gennemsnitlige ubekræftet ikke-spam score",
                                      "formodet_spam" => "Gennemsnitlige formodet spam score",
                                      "spam"           => "Gennemsnitlige spam score",
                                      "virus"          => "",
                                      "fp"             => "Gennemsnitlige falske positive score",
                                      "fn"             => "Gennemsnitlige falske negative score",
                                      "wl"             => "",
                                      "bl"             => "",
                                      "bad_header"     => "",
                                      "blokerede_fil"    => "",
                                      "for store"      => "");

    $lang['array_largest_størrelse'] =  array("ham"            => "Støreste ikke-spam størrelse",
                                      "formodet_ham"  => "Støreste ubekræftet ikke-spam størrelse",
                                      "formodet_spam" => "Støreste formodet spam størrelse",
                                      "spam"           => "Støreste spam størrelse",
                                      "virus"          => "Støreste virus størrelse",
                                      "fp"             => "Støreste falske positive størrelse",
                                      "fn"             => "Støreste falske negative størrelse",
                                      "wl"             => "Støreste godkendte itikkestørrelse",
                                      "bl"             => "Støreste blokerede email størrelse",
                                      "bad_header"     => "Støreste ukorrekt header størrelse",
                                      "blokerede_fil"    => "Støreste blokerede fil størrelse",
                                      "for store"      => "Støreste email størrelse");

    $lang['array_smallest_størrelse'] =  array("ham"            => "Mindste ikke-spam størrelse",
                                      "formodet_ham"  => "Mindste ubekræftet ikke-spam størrelse",
                                      "formodet_spam" => "Mindste formodet spam størrelse",
                                      "spam"           => "Mindste spam størrelse",
                                      "virus"          => "Mindste virus størrelse",
                                      "fp"             => "Mindste falske positive størrelse",
                                      "fn"             => "Mindste falske negative størrelse",
                                      "wl"             => "Mindste godkendte email størrelse",
                                      "bl"             => "Mindste blokerede email størrelse",
                                      "bad_header"     => "Mindste ukorrekte header størrelse",
                                      "blokerede_fil"    => "Mindste blokerede fil størrelse",
                                      "for store"      => "Mindste email størrelse");

    $lang['array_average_størrelse'] =  array("ham"            => "Gennemsnitlige ikke-spam størrelse",
                                      "formodet_ham"  => "Gennemsnitlige ubekræftet ikke-spam størrelse",
                                      "formodet_spam" => "Gennemsnitlige formodet spam størrelse",
                                      "spam"           => "Gennemsnitlige spam størrelse",
                                      "virus"          => "Gennemsnitlige virus størrelse",
                                      "fp"             => "Gennemsnitlige falske positive størrelse",
                                      "fn"             => "Gennemsnitlige falske negative størrelse",
                                      "wl"             => "Gennemsnitlige godkendte email størrelse",
                                      "bl"             => "Gennemsnitlige blokerede emaill størrelse",
                                      "bad_header"     => "Gennemsnitlige ukorrekte header  størrelse",
                                      "blokerede_fil"    => "Gennemsnitlige blokerede fil email størrelse",
                                      "for store"      => "Gennemsnitlige for store email størrelse");

    $lang['array_båndbredde'] =  array("ham"            => "Ikke-spam båndbredde",
                                      "formodet_ham"  => "Ubekræftet ikke-spam båndbredde",
                                      "formodet_spam" => "Formodet spam båndbredde",
                                      "spam"           => "Spam båndbredde",
                                      "virus"          => "Virus båndbredde",
                                      "fp"             => "Falske positive båndbredde",
                                      "fn"             => "Falske negative båndbredde",
                                      "wl"             => "Godkendte email båndbredde",
                                      "bl"             => "Blokerede email båndbredde",
                                      "bad_header"     => "Ukorrekte header email båndbredde",
                                      "blokerede_fil"    => "Blokerede fil email båndbredde",
                                      "for store"      => "For store email båndbredde");

    $lang['array_pris'] =  array("ham"            => "Ikke-spam båndbredde pris",
                                      "formodet_ham"  => "Ubekræftet ikke-spam båndbredde pris",
                                      "formodet_spam" => "Formodet spam båndbredde pris",
                                      "spam"           => "Spam båndbredde pris",
                                      "virus"          => "Virus båndbredde pris",
                                      "fp"             => "Falske positive båndbredde pris",
                                      "fn"             => "Falske negative båndbredde pris",
                                      "wl"             => "Godkendte email båndbredde pris",
                                      "bl"             => "Blokerede email båndbredde pris",
                                      "bad_header"     => "Ukorrekte header email båndbredde pris",
                                      "blokerede_fil"    => "Blokerede fil email båndbredde pris",
                                      "for store"      => "For store email båndbredde pris");

    $lang['array_percentage'] =  array("ham"            => "Procentdel af alle modtaget emails",
                                      "formodet_ham"  => "Procentdel af alle modtaget emails",
                                      "formodet_spam" => "Procentdel af alle modtaget emails",
                                      "spam"           => "Procentdel af alle modtaget emails",
                                      "virus"          => "Procentdel af alle modtaget emails",
                                      "fp"             => "Procentdel af alle modtaget emails",
                                      "fn"             => "Procentdel af alle modtaget emails",
                                      "wl"             => "Procentdel af alle modtaget emails",
                                      "bl"             => "Procentdel af alle modtaget emails",
                                      "bad_header"     => "Procentdel af alle modtaget emails",
                                      "blokerede_fil"    => "Procentdel af alle modtaget emails",
                                      "for store"      => "Procentdel af alle modtaget emails");
?>
