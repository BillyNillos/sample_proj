<?php include('header.php'); ?>
    <main class="log-in">
        <div class="log-in-content font-0">
            <h1 class="log-in-heading">Log In</h1>
            <div class="log-in-form">
                <div class="log-in-form-field">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="johndoe">
                </div>
                <div class="log-in-form-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="•••••">
                </div>
                <div class="log-in-form-message"></div>
                <div class="log-in-form-submit">
                    <button type="submit" name="btn-login" id="btn-login">Log In</button>
                </div>
                <div class="log-in-form-option">
                    <a href="sign-up.php">Create A New Account</a>
                </div>
            </div>
        </div>
    </main>
<?php include('footer.php'); ?>