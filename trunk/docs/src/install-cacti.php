<?php
        include "vars.php";
        $PAGE_TITLE="Installation - Cacti Plugin";
        include "common-page-head.php";
?>

            <h2>Installation</h2>

            <h3>Cacti plugin</h3>

            <h4>Requirements</h4>

            <p><strong>Before</strong> doing anything else, please verify that your
            <a href = "http://cactiusers.org/">Plugin Architecture</a> is working
            properly with a simpler plugin, like
            <a href = "http://wotsit.thingy.com/haj/cacti/links-plugin.html">Links</a> or
            <a href = "http://cactiusers.org/">Tools</a>. Weathermap is relatively
            complex, and fault-finding both your Cacti Plugin Architecture and
            Weathermap at the same time will make life harder for you!</p>

            <p>You will need the 'pcre' and 'gd' PHP modules in
            <em>your command-line PHP</em>. The poller-process runs using the
            command-line PHP which is not always the same as the server-side one. In
            some situations it is possible to have two completely different PHP
            installations serving these two
            - if you install from a package, then re-install from source, but to a
            different directory, for example. The poller process should warn you if the
            part it needs is not present.</p>

            <p>Before you start using it, you might want to change one PHP setting.
            Weathermap uses a fair bit of memory by PHP standards, as it builds the
            image for the map in memory before saving it. As a result, your PHP process
            <i>may</i> run out of memory. PHP has a 'safety valve' built-in, to stop
            runaway scripts from killing your server, which defaults to 8MB in most
            versions (this has changed in 5.2.x). This is controlled by the
            'memory_limit =' line in php.ini. You may need to increase this to 32MB or
            even more if you have problems. In fact, the current Cacti manual suggests
            128MB. These problems will typically show up as the poller process just
            dying with no warning or error message, as PHP kills the script.</p>

            <h4>Installation</h4>

            <p>To use the Cacti plugin, you
            <i>must</i> unpack the zip file into a directory called
            '<i>&lt;cacti_root&gt;</i>/plugins/weathermap'. The zip contains a folder
            called 'weathermap' already, so unzipping it in the plugins folder should do
            the job.</p>

            <p>You can then use the pre-install checker to see if your PHP environment
            has everything it needs. To do this, you need to run a special
            <tt>check.php</tt> script, twice...</p>

            <p>First, go to http://yourcactiserver/plugins/weathermap/check.php to see
            if your webserver PHP (mod_php, ISAPI etc) is OK. Then, from a
            command-prompt run
            <tt>php check.php</tt> to see if your command-line PHP is OK. If any modules
            or functions are missing, you will get a warning, and an explanation of what
            will be affected (not all of the things that are checked are deadly
            problems).</p>

            <h4>File Permissions</h4>

            <p>
            You will need to change the permissions on the
            <tt>output</tt> directory, so that the Cacti poller process can write to it.
            This is the same as you would have done for the
            <tt>rra</tt> directory while installing Cacti itself originally. For a *nix
            system, it will be something like:

            <div class = "shell">
                <pre>
                                chown cactiuser output
</pre>
            </div>

            <h4>Getting Started</h4>

            <p>To actually enable the plugin, you need to add a line to your Cacti
            config file. This file is includes/config.php for Cacti 0.8.6 and
            includes/global.php for Cacti 0.8.7(a through f), then includes/config.php again for 0.8.7g and newer:

            <div class = "shell">
                <pre>
                                $plugins = array();
                                $plugins[] = 'monitor';
                                <b>$plugins[] = 'weathermap';</b>
</pre>
            </div>

            <p>
            Now, refresh your Cacti page, to be sure that everything is still working
            right. If not, remove the line you just added and you should return to
            normal. Make a note of any error message and let me know!
            </p>

            <p>
            <img src = "../images/cacti_step1.png" />Assuming it all looks fine (but not
            very different), you can start to enable Weathermap. Log in as 'admin' or
            another user with User Management rights, go to the User Management section
            under Tools in the Cacti console, and then choose your own username from the
            list. Check the two new 'realms' boxes that should be there
            - View Weathermaps, and Manage Weathermaps
            - and then click Save. A 'Weathermap' tab should appear at the top of the
            page.</p>

            <p>That's it! The Weathermap plugin is installed. To go further, you need
            some weathermap configuration files to define your maps. You can do this in
            two ways
            - using the Web-based map editor, or by editing the text-based configuration
            files directly.</p>

            <p>To use the editor, you need to make a few more changes. </p>

            <p>To learn more about actually <i>using</i> the Cacti plugin, see the
            <a href = "cacti-plugin.html">Cacti Plugin page</a>.</p>

<?php
        include "common-page-foot.php";
