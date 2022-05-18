

<!-- LOGIN FORM -->

<section>
    <?php
        
     echo form_open('loginuser');
     ?>

        <div class="container">
            <h1 style="text-align: center;">Login</h1>
        </div>
        <div>
            <span id="message" style="color: red;"><?= session('msg');?></span>
        </div>
        <div class="container">

                <?php 

                echo form_label('<b>Email</b>*', 'username');
                $email = [
                    'type'  => 'email',
                    'name'  => 'email',
                    'id'    => 'email',
                    'value' => set_value('email'),
                    'placeholder' => 'Enter Email',
                ];
                echo form_input($email);
                ?>
           
            <div>
                <span id="email_message" style="color:red"><?php if(isset($validation)){echo $validation->getError('email');}?></span>
            </div>

                <?php 

                echo form_label('<b>Password</b>*', 'pass');
                $password = [
                    'name'  => 'password',
                    'id'    => 'password',
                    'value' => set_value('password'),
                    'placeholder' => 'Enter Password',
                ];
                echo form_password($password);

                $submit = [
                    'type'  => 'submit',
                    'name'  => 'login',
                    'id'    => 'login',
                    'content' => 'login',
                   
                ];
                echo form_button($submit);
                ?>

        </div>

        <div class="container" style="background-color:#f1f1f1">
            <span class="pass">
                <a href="register">Sign Up</a>
               
            </span>
        </div>
    </form>
	
</section>





<!-- SCRIPTS -->

<script>
	
</script>

<!-- -->

</body>
</html>
