<?php include('header.php'); ?>
    <main class="signup">
        <div class="signup-content font-0">
            <h1 class="signup-heading">Sign Up</h1>
            <div class="signup-form">
                <div class="signup-form-field">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" placeholder="John">
                </div>
                <div class="signup-form-field">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Doe">
                </div>
                <div class="signup-form-field">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="johndoe">
                </div>
                <div class="signup-form-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="•••••">
                </div>
                <div class="signup-form-field">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Retype your password">
                </div>
                <div class="signup-form-message"></div>
                <img src="assets/images/ajax-loader.gif" alt="Loading">
                <div class="signup-form-submit">
                    <button type="submit" name="btn-signup" id="btn-signup">Sign Up</button>
                </div>
                <div class="signup-form-option">
                    <a href="log-in.php">Already have an account?</a>
                </div>
            </div>
        </div>
    </main>
<?php include('footer.php'); ?>