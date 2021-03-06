<?php
if (isset($all_domains) and $all_domains) {
    if (isset($existing_installs) and $existing_installs) {
        foreach ($all_domains as $key => $domain) {
            foreach ($existing_installs as $existing_install) {
                if ($domain['domain'] == $existing_install['domain']) {
                    unset($all_domains[$key]);
                }
            }
        }
    }
}
?>

<h2>Create a new website</h2><br/>
<form method="POST">
    <a name="install"></a>
    <input type="hidden" name="_action" value="install">

    <?php if (isset($all_domains) and $all_domains) { ?>
        <div class="row">
            <div id="row-no-matches" class="col-md-5">
                <div class="form-group">
                    <label class="control-label" for="domain">Select domain:</label>
                    <select name="domain" id="domain" class="form-control">
                        <?php foreach ($all_domains as $domain): ?>
                            <option value="<?php echo htmlspecialchars(json_encode($domain)); ?>"><?php echo $domain['domain']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="pull-right" style="padding: 5px 0;">
                    <a href="./addon/index.html">Create new domain</a>&nbsp; or &nbsp;<a href="./subdomain/index.html">Create Sub-domain</a>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            <div class="row">
                <div class="col-sm-6">
                    <p style=" margin: 10px;">Seems you do not have any available domains</p>
                </div>
                <div class="col-sm-6 text-right">
                    <a class="btn  btn-primary" href="./addon/index.html">Create new domain</a>
                    &nbsp; or &nbsp;
                    <a class="btn btn-primary" href="./subdomain/index.html">Create Sub-domain</a>
                </div>
            </div>
        </div>
    <?php } ?>


    <?php if (isset($all_domains) and $all_domains) { ?>
        <div class="row" style="margin-top:20px;">
            <div class="col-md-5">
                <h3>Admin account details</h3>
                <br>

                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="admin_email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Username</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="admin_username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Password</label>
                        <div class="col-lg-9">
                            <input type="password" class="form-control" name="admin_password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Confirm Password</label>
                        <div class="col-lg-9">
                            <input type="password" class="form-control" name="admin_password_confirm">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label"></label>
                        <div class="col-lg-9">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="express" value="1" onclick="advancedRadioChanged()"
                                           checked>
                                    Use automatic database settings
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="express" onclick="advancedRadioChanged()" value="0">
                                    Manual database settings
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="advanced" style="display: none;">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Database Driver:</label>
                            <div class="col-lg-9">
                                <select name="db_driver" class="form-control">
                                    <option value="mysql">MySQL</option>
                                    <option value="sqlite">SQLite</option>

                                </select>
                            </div>
                        </div>

                        <?php

                        /* <div class="form-group">
                             <label class="col-lg-3 control-label">Database Host</label>
                             <div class="col-lg-9">
                                 <input type="text" class="form-control" name="db_host" value="localhost">
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-lg-3 control-label">Database Name</label>
                             <div class="col-lg-9">
                                 <input type="text" class="form-control" name="db_name"
                                        value="<?php echo $controller->makeDBPrefix(); ?>">
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-lg-3 control-label">Database Username</label>
                             <div class="col-lg-9">
                                 <input type="text" class="form-control" name="db_username"
                                        value="<?php echo $controller->makeDBPrefix(); ?>">
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-lg-3 control-label">Database Password</label>
                             <div class="col-lg-9">
                                 <input type="password" class="form-control" name="db_password">
                             </div>
                         </div>
                    */

                        ?>

                    </div>

                    <div class="form-group text-right">
                        <div class="col-lg-12">
                            <button class="btn btn-lg btn-primary" type="submit">Finish the installation</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    <?php } ?>
</form>