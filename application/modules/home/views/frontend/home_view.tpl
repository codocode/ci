
   <h1>Simple Login with CodeIgniter</h1>
   {validation_errors()}
   {'login/submit'|form_open}
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username" value="{if isset($uname)}{$uname}{/if}" />
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password" value="{if isset($upass)}{$upass}{/if}" />
     <br/>
     <input type="submit" value="Login" name="user_log_in" />
     
    <label> <input type="checkbox" value="1" name="remember_me" {if isset($remember_me)}checked="checked"{/if}} /> remember me </label>
   </form>
