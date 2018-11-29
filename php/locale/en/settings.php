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

    // Page subtitle
    $lang['banner_subtitle'] =  "Mail Filter Settings";

    // Table headers
    $lang['header_addresses'] =  "E-mail Addresses";
    $lang['header_miscellaneous'] =  "Miscellaneous Settings";
    $lang['header_address'] =  "Address";
    $lang['header_login_info'] =  "Login Credentials";
    $lang['header_add_email'] =  "Add New Email Address/Alias";

    // Text messages
    $lang['text_username'] =  "Username";
    $lang['text_email_address'] =  "E-mail address";
    $lang['text_password'] =  "Password";
    $lang['text_reminders'] =  "Send quarantine reminder e-mail?";
    $lang['text_charts'] =  "Display graphic charts?";
    $lang['text_yes'] =  "Yes";
    $lang['text_no'] =  "No";
    $lang['text_virus_scanning'] =  "Virus Scanning";
    $lang['text_enabled'] =  "Enabled";
    $lang['text_disabled'] =  "Disabled";
    $lang['text_quarantined'] =  "Quarantined";
    $lang['text_labeled'] =  "Labeled";
    $lang['text_discarded'] =  "Discarded";
    $lang['text_detected_viruses'] =  "Detected viruses should be...";
    $lang['text_spam_filtering'] =  "Spam Filtering";
    $lang['text_detected_spam'] =  "Detected spam should be...";
    $lang['text_prefix_subject'] =  "Add a prefix to the subjects of spam";
    $lang['text_add_spam_header'] =  "Add X-Spam: Headers when Score is";
    $lang['text_consider_mail_spam'] =  "Consider mail 'Spam' when Score is";
    $lang['text_quarantine_spam'] =  "Quarantine Spam when Score is";
    $lang['text_kill_spam'] =  "Discard Spam (without quarantine) when Score is";
    $lang['text_attachment_filtering'] =  "Attachment Type Filtering";
    $lang['text_mail_with_attachments'] =  "Mail with dangerous attachments should be...";
    $lang['text_bad_header_filtering'] =  "Bad Header Filtering";
    $lang['text_mail_with_bad_headers'] =  "Mail with bad headers should be...";
    $lang['text_settings_updated'] =  "Your mail filter settings have been updated.";
    $lang['text_address_added'] =  "Address %s has been linked to your account.";
    $lang['text_login_failed'] =  "Authentication failed for '%s'.";
    $lang['text_primary'] =  "Primary Address";
    $lang['text_no_addresses_linked'] =  "No addresses have been linked to this account.";
    $lang['text_new_primary_email'] =  "%s is now your primary e-mail address.";
    $lang['text_language'] =  "Display Language";
    $lang['text_charset'] =  "Display Character Set";
    $lang['text_theme']	= "Theme";
    $lang['text_spamtrap'] =  "Is this a spam-trap account?";
    $lang['text_auto_whitelist'] =  "Add senders of rescued mail to your whitelist?";
    $lang['text_items_per_page'] =  "Mail items to be displayed on each page?";
    $lang['text_digest_interval'] = "Email Digest interval? (0 to deactivate, in hours)";
    $lang['text_domain_digest_interval'] = "Default Email Digest interval? (0 to deactivate, in hours)";
    $lang['text_new_login_name'] =  "New Username";
    $lang['text_new_password'] =  "New Password";
    $lang['text_confirm_new_password'] =  "Confirm New Password";
    $lang['text_login_name_empty'] =  "A username is required.";
    $lang['text_login_name_not_allowed'] =  "Usernames cannot start with '@'.";
    $lang['text_password_empty'] =  "A password and its confirmation must be supplied.";
    $lang['text_password_mismatch'] =  "The password and confirmation do not match.";
    $lang['text_login_name_exists'] =  "The username you requested has already been taken by another user.";
    $lang['text_password_updated'] =  "Your password has been changed.";
    $lang['text_credentials_updated'] =  "Your username and password have been changed.";

    // Buttons
    $lang['button_add_email_address'] =  "Add E-Mail Address";
    $lang['button_reset'] =  "Reset";
    $lang['button_update_misc'] =  "Update Miscellaneous Settings";
    $lang['button_update_address'] =  "Update This Address' Settings";
    $lang['button_update_all_addresses'] =  "Update ALL Addresses' Settings";
    $lang['button_make_primary'] =  "Make Primary";
    $lang['button_change_login_info'] =  "Update Login Credentials";

    // Links
    $lang['link_settings'] =  "Return to Your Settings Page";
?>
