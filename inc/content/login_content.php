<h2>Sign In</h2>
<form method="post" action="http://localhost/login_attempt.php" class="login_form">
	<label for="login_email_input" class="login_input_label">Email</label>
    <input type="text" name="login_email_input" class="login_email_input" id="login_email_input" title="Enter your email address here" maxlength="64">
	<label for="login_password_input" class="login_input_label">Password</label>
    <input type="password" name="login_password_input" class="login_password_input" id="login_password_input" title="Enter your password here" maxlength="16">
    <!--<em><a href="" title="">Forgot your password?</a></em>-->
	<label for="login_remember_email_checkbox" class="login_remember_email_label">
        <input type="checkbox" class="login_remember_email_checkbox" id="login_remember_email_checkbox" name="login_remember_email_checkbox" value="1">
        Remember my email address
    </label>
    <button type="submit" class="button" title="Sign in to the Users area">Sign In</button>
</form>