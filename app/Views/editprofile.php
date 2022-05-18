<!-- LOGIN FORM -->

<section>
    <form action="edituserprofile" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="opic" value="<?= $pic ?>">
        <div class="container">
            <span class=""><a href="welcome">back</a></span>
        </div>
        <div class="container">
            <img src="pic/<?= $pic ?>" style=" width: 120px;height: 120px;border-radius: 50%;" name="opic" alt="">
            <input type="file" name="pic" id="file">
        </div>
        <div>
            <?php if(session()->getFlashdata('msg')):?>
            <span id="message" style="color: red;"><?= session()->getFlashdata('msg') ?>
                <?php endif;?>
            </span>
        </div>
        <div class="container">
            <label for="firstname">
                <b>First Name</b>
            </label>
            <input type="text" placeholder="Enter First Name" id="firstname" name="firstname" value="<?= $firstname ?>">
            <div>
                <?php if(session()->getFlashdata('validation')):?>
                <span id="message" style="color: red;"><?php $data = session()->getFlashdata('validation'); echo $data->getError('firstname'); ?>
                    <?php endif;?>
                </span>
            </div>

            <label for="lastname">
                <b>Last Name</b>
            </label>
            <input type="text" placeholder="Enter Last Name" id="lastname" name="lastname" value="<?= $lastname ?>">
            <div>
                <?php if(session()->getFlashdata('validation')):?>
                    <span id="message" style="color: red;"><?php $data = session()->getFlashdata('validation'); echo $data->getError('lastname'); ?>
                    <?php endif;?>
                </span>
            </div>



            <label for="qualification">
                <b>Qualification</b>
            </label>
            <input type="text" placeholder="Enter Qualification" name="qualification" value="<?= $qualification ?>">

            <label for="cno">
                <b>Contact number</b>
            </label>
            <input type="text" placeholder="Enter Contact number" maxlength="11" name="cno" value="<?= $cno ?>">

            <label for="address">
                <b>Address</b>
            </label>
            <input type="text" placeholder="Enter Address" name="address" value="<?= $address ?>">

            <label for="country">
                <b>Country</b>
            </label>
            <select id="select1" name="country">
                <option value="" disabled>Select The Country</option>
                <option value="Pakistan" <?php if($qualification == 'Pakistan'){ echo 'selected';} ?>>Pakistan</option>
            </select>

            <label for="city">
                <b>city</b>
            </label>
            <select name="city" id="select2">
                <option value="" disabled>Select The City</option>
                <option value="Islamabad" <?php if($city == 'Islamabad'){ echo 'selected';} ?>>Islamabad</option>
                <option value="" disabled>Punjab Cities</option>
                <option value="Ahmed Nager Chatha" <?php if($city == 'Ahmed Nager Chatha'){ echo 'selected';} ?>>Ahmed
                    Nager Chatha</option>
                <option value="Ahmadpur East" <?php if($city == 'Ahmadpur East'){ echo 'selected';} ?>>Ahmadpur East
                </option>

            </select>

            <label for="dob">
                <b>DOB</b>
            </label>
            <input type="date" placeholder="Enter DOB" name="dob" value="<?= $dob ?>">

            <label for="gander">
                <b>Gander</b>
            </label>
            <br>
            <input type="radio" id="male" name="gander" value="Male" <?php if($gander == 'Male'){ echo 'checked';} ?>>
            <label for="html">Male</label>
            <input type="radio" id="female" name="gander" value="Female"
                <?php if($gander == 'Female'){ echo 'checked';} ?>>
            <label for="css">Female</label>
            <br>


            <label for="ms">
                <b>Martial Status</b>
            </label>
            <select name="ms" id="select3">
                <option value="" disabled>Marital Status</option>
                <option value="Single" <?php if($ms == 'Single'){ echo 'selected';} ?>>Single</option>
                <option value="Married" <?php if($ms == 'Married'){ echo 'selected';} ?>>Married</option>
                <option value="Widowed" <?php if($ms == 'Widowed'){ echo 'selected';} ?>>Widowed</option>
                <option value="Separated" <?php if($ms == 'Separated'){ echo 'selected';} ?>>Separated</option>
                <option value="Divorced" <?php if($ms == 'Divorced'){ echo 'selected';} ?>>Divorced</option>
            </select>
            <button type="submit" name="save">Save</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <span><a href="welcome">back</a></span>
        </div>
    </form>

</section>

<section>
    <!-- // password change -->

    <form action="changepassword" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="container">
            <h1 style="text-align: center;">Change Password</h1>
        </div>

        <div class="container">
            <label for="oldpassword">
                <b>Old Password*</b>
            </label>
            <input type="password" placeholder="Enter Old Password" id="oldpassword" name="oldpassword">
            <div>
                <?php if(session()->getFlashdata('validation')):?>
                <span id="message" style="color: red;"><?php $data = session()->getFlashdata('validation'); echo $data->getError('oldpassword'); ?>
                    <?php endif;?>
                </span>
            </div>


            <label for="newpassword">
                <b>New Password*</b>
            </label>
            <input type="password" id="newpassword" placeholder="Enter Password" name="newpassword">
            <div>
                <?php if(session()->getFlashdata('validation')):?>
                <span id="message" style="color: red;"><?php $data = session()->getFlashdata('validation'); echo $data->getError('newpassword'); ?>
                    <?php endif;?>
                </span>
            </div>

            <label for="comfirmnewnpass">
                <b>Change New Password*</b>
            </label>
            <input type="password" id="comfirmnewnpass" placeholder="Enter Password" name="comfirmnewnpass">
                <div>
                <?php if(session()->getFlashdata('validation')):?>
                <span id="message" style="color: red;"><?php $data = session()->getFlashdata('validation'); echo $data->getError('comfirmnewnpass'); ?>
                    <?php endif;?>
                </span>
            </div>


            <button type="submit" name="changepassword" id="changepassword">Change</button>
        </div>
    </form>
</section>



<!-- SCRIPTS -->

<script>

</script>

<!-- -->

</body>

</html>