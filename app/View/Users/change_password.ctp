<?php 
echo $this->Form->create('User');
echo $this->Form->input('id');
echo $this->Form->input('current_password');
echo $this->Form->input('password1');
echo $this->Form->input('password2');
echo $this->Form->end('Submit');