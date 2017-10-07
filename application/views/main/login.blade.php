<aside id="sidebar" class="alignright span4">

    <!-- USER PANEL -->
                                    <!-- Login -->
            <div class="title-divider">
                <h3>Login</h3>
                <div class="divider-arrow"></div>
            </div>
            <section class="block-grey aligncenter">
                <form id="frm-login" action="cek_login.htm" class="form-inline aligncenter" method="post">
                    <br>
                    <div class="controls">
                        <input type="text" placeholder="Username" name="username" required>
                    </div><br>
                    <div class="controls">
                        <input type="password" placeholder="Password" name="password" required>
                    </div><br>
                    <div class="controls">
                        <input type="submit" class="btn btn-primary btn-large" value="Login">
                        <input type="button" class="btn btn-primary btn-large" value="Daftar Baru" onclick="window.location = '{{base_url('main/daftar')}}';"/>
                    </div>
                </form>
            </section>
</aside>