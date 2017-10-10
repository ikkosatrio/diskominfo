<aside id="sidebar" class="alignright span4">

    <!-- USER PANEL -->
                                    <!-- Login -->
            <div class="title-divider">
                <h3>Login</h3>
                <div class="divider-arrow"></div>
            </div>
            <section class="block-grey aligncenter">
                <form id="form-login" action="{{base_url('authentication/go/member')}}" class="form-inline aligncenter" method="post">
                    <br>
                    
                    @if (!$ctrl->session->userdata('authmember'))
                        <div class="controls">
                            <input type="text" placeholder="Username" name="username" required>
                        </div><br>
                        <div class="controls">
                            <input type="password" placeholder="Password" name="password" required>
                        </div><br>
                    <br>
                    @else
                        {{$ctrl->session->userdata('authmember_name')}}
                    @endif
                    <div class="controls">
                        
                        @if ($ctrl->session->userdata('authmember'))
                            <input type="button" class="btn btn-success btn-large" value="Menu" onclick="window.location = '{{base_url('superuser')}}';"/>
                        @else
                            <input type="submit" class="btn btn-primary btn-large" value="Login">
                            <input type="button" class="btn btn-primary btn-large" value="Daftar Baru" onclick="window.location = '{{base_url('main/daftar')}}';"/>
                        @endif
                    </div>
                </form>
            </section>
</aside>
<script type="text/javascript">
        $("#form-login").submit(function(e){
        e.preventDefault();
        
        $.ajax({
          url : $("#form-login").attr('action'),
          type : 'POST',
          data : $("#form-login").serialize()
        })
        .done(function(data){
          alert(data.msg)
          location.reload();
          var go  = setTimeout(function(){
            redirect("{{base_url('main')}}");
          },1000);

        })
      })
    </script>