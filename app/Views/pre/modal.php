<style>
  .modal-window {
  position: fixed;
  background-color: rgba(78, 75, 75, 0.51);
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 100000;
  visibility: hidden;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s;
}
.modal-window:target {
  visibility: visible;
  opacity: 1;
  pointer-events: auto;
}
.modal-window > div {
  width: 400px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 2em;
  background:white;
}
.modal-window header {
  font-weight: bold;
}
.modal-window h1 {
  font-size: 150%;
  margin: 0 0 15px;
}

.modal-close {
  color: #aaa;
  line-height: 50px;
  font-size: 80%;
  position: absolute;
  right: 0;
  text-align: center;
  top: 0;
  width: 70px;
  text-decoration: none;
}
.modal-close:hover {
  color: black;
}


a {
  color: inherit;
  text-decoration: none;
}


.modal-window > div {
  border-radius: 1rem;
}

.modal-window div:not(:last-of-type) {
  margin-bottom: 15px;
}

/* .logo {
  max-width: 150px;
  display: block;
} */

</style>

<div id="login-user" class="modal-window">
  <div>
    <a href="#" title="Close" class="modal-close">Close</a>
    <h1>Welcome Back!</h1>
    <div>
      We're excited to have you back. Please log into your account to continue exploring or managing your shortlets.
    </div>
    <br>
    <div>
      <!-- Login Button -->
      <a href="<?php echo base_url()?>login" class="btn btn-primary py-3 px-4 me-3 animated fadeIn">Agent Login</a>
      <a href="<?php echo base_url()?>login" class="btn btn-primary py-3 px-4 me-3 animated fadeIn">Guest Login</a>
    </div>
    <br>
    <div>
      <small>Don't have an account? <a href="<?php echo base_url()?>register-as-agent" style="color: blue;">Agent Signup</a> or <a href="<?php echo base_url()?>user-signup" style="color: blue;">Guest Signup</a>.</small>
    </div>
    <br>
    <div>
      <small>Need assistance? <a style="color: blue;" href="<?= base_url()?>contact">Contact Us</a>.</small>
    </div>
  </div>
</div>

<div id="open-modal" class="modal-window">
  <div>
    <a href="#" title="Close" class="modal-close">Close</a>
    <h1>Sign Up</h1>
    <div>
      Choose how you want to sign up. Are you an agent looking to list properties or a guest looking to book shortlets?
    </div>
    <br>
    <div class="d-flex">
      <!-- Button for Agents -->
      <a href="<?php echo base_url()?>register-as-agent" class="btn btn-primary py-3 px-3 me-3 animated fadeIn">Register as Agent</a>
<br>
<br>
      <!-- Button for Guests -->
      <a href="<?php echo base_url()?>user-signup" class="btn btn-secondary py-3 px-3 animated fadeIn">Register as Guest</a>
    </div>
    <br>
    <div>
    <small>Already have an account? <a href="#login-user">Log in here</a>.</small>     </div>
  </div>
</div>
