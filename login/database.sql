DROP TABLE IF EXISTS bans;

CREATE TABLE `bans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` text NOT NULL,
  `uid` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS blocks;

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` text NOT NULL,
  `ip` text NOT NULL,
  `logs` text NOT NULL,
  `reason` text NOT NULL,
  `until` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS forgot_codes;

CREATE TABLE `forgot_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` text NOT NULL,
  `uid` text NOT NULL,
  `used` text NOT NULL,
  `code` text NOT NULL,
  `ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS inputs;

CREATE TABLE `inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place` text NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `placeholder` text NOT NULL,
  `value` text NOT NULL,
  `required` text NOT NULL,
  `input_error` text NOT NULL,
  `maxlength` text NOT NULL,
  `min` text NOT NULL,
  `max` text NOT NULL,
  `step` text NOT NULL,
  `rows` text NOT NULL,
  `checked` text NOT NULL,
  `options` text NOT NULL,
  `public` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO inputs VALUES('1','1','Country','text','','','false','','0','0','0','0','0','false','','true');




DROP TABLE IF EXISTS log;

CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `success` text NOT NULL,
  `time` text NOT NULL,
  `ip` text NOT NULL,
  `uid` text NOT NULL,
  `try` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS messages;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sendfrom` text NOT NULL,
  `sendto` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `time` text NOT NULL,
  `opened` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS payments;

CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` text NOT NULL,
  `time` text NOT NULL,
  `amount` text NOT NULL,
  `currency` text NOT NULL,
  `payer` text NOT NULL,
  `receiver` text NOT NULL,
  `txn_id` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS permissions;

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `level` int(11) NOT NULL,
  `on_login` text NOT NULL,
  `on_logout` text NOT NULL,
  `no_permission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO permissions VALUES('1','Admin','3','/login/settings.php?page=main','','');
INSERT INTO permissions VALUES('2','Superuser','2','','','');
INSERT INTO permissions VALUES('3','User','1','','','');




DROP TABLE IF EXISTS settings;

CREATE TABLE `settings` (
  `setting` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO settings VALUES('page_disabled_message','');
INSERT INTO settings VALUES('default_permission','3');
INSERT INTO settings VALUES('login_with','username');
INSERT INTO settings VALUES('admin_email','');
INSERT INTO settings VALUES('email_name','admin');
INSERT INTO settings VALUES('disable_register','false');
INSERT INTO settings VALUES('disable_login','false');
INSERT INTO settings VALUES('disable_profile','false');
INSERT INTO settings VALUES('username_change','false');
INSERT INTO settings VALUES('email_change','false');
INSERT INTO settings VALUES('password_change','true');
INSERT INTO settings VALUES('send_messages','false');
INSERT INTO settings VALUES('max_failed_attempts','10');
INSERT INTO settings VALUES('blocked_amount','24');
INSERT INTO settings VALUES('blocked_format','hours');
INSERT INTO settings VALUES('log_successful_logins','true');
INSERT INTO settings VALUES('log_failed_logins','true');
INSERT INTO settings VALUES('redirect_last_page','false');
INSERT INTO settings VALUES('case_sensitive','false');
INSERT INTO settings VALUES('publickey','');
INSERT INTO settings VALUES('privatekey','');
INSERT INTO settings VALUES('max_ip','0');
INSERT INTO settings VALUES('recaptcha','false');
INSERT INTO settings VALUES('require_email','false');
INSERT INTO settings VALUES('send_welcome_mail','false');
INSERT INTO settings VALUES('activation','0');
INSERT INTO settings VALUES('username_minlength','4');
INSERT INTO settings VALUES('username_maxlength','16');
INSERT INTO settings VALUES('password_minlength','6');
INSERT INTO settings VALUES('password_maxlength','20');
INSERT INTO settings VALUES('mailtype','local');
INSERT INTO settings VALUES('smtp_hostname','');
INSERT INTO settings VALUES('smtp_username','');
INSERT INTO settings VALUES('smtp_password','');
INSERT INTO settings VALUES('smtp_port','');
INSERT INTO settings VALUES('smtp_ssl','false');
INSERT INTO settings VALUES('welcome_mail_subject','Welcome {name}');
INSERT INTO settings VALUES('welcome_mail','&lt;h2&gt;Welcome&lt;/h2&gt;
\n
\nThank you for your registration.
\nWe hope you enjoy your time here.
\n
\n&lt;h2&gt;Your info&lt;/h2&gt;
\n&lt;strong&gt;Name:&lt;/strong&gt; {name}
\n&lt;strong&gt;Email:&lt;/strong&gt; {email}
\n&lt;strong&gt;Registration date:&lt;/strong&gt; {date}
\n&lt;strong&gt;IP:&lt;/strong&gt; {ip}
\n&lt;strong&gt;Permission:&lt;/strong&gt; {perm}');
INSERT INTO settings VALUES('validation_mail_subject','Validation of {email}');
INSERT INTO settings VALUES('validation_mail','Click on the url below to activate your account:
\n{val_url}');
INSERT INTO settings VALUES('reset_mail_subject','Password reset request');
INSERT INTO settings VALUES('reset_mail','We received your password reset request.
\nIf you didn&#039;t do this, please ignore this email or if this happens more often try to report it to the owner of this site.
\n
\nClick on the url below to change your password:
\n{reset_url}');
INSERT INTO settings VALUES('use_redirect_login','true');
INSERT INTO settings VALUES('redirect_login','/login/profile.php');
INSERT INTO settings VALUES('use_redirect_logout','false');
INSERT INTO settings VALUES('redirect_logout','');
INSERT INTO settings VALUES('use_redirect_nopermission','true');
INSERT INTO settings VALUES('redirect_nopermission','/login/profile.php?m=1');
INSERT INTO settings VALUES('use_redirect_notloggedin','true');
INSERT INTO settings VALUES('redirect_notloggedin','/login/login.php?m=1');
INSERT INTO settings VALUES('message_login','You are logged in now');
INSERT INTO settings VALUES('message_logout','You are logged out now');
INSERT INTO settings VALUES('message_nopermission','You don&#039;t have enough permissions to do that');
INSERT INTO settings VALUES('message_notloggedin','You are not logged in');
INSERT INTO settings VALUES('paypal_email','');
INSERT INTO settings VALUES('enable_paypal','false');
INSERT INTO settings VALUES('paypal_currency','EUR');
INSERT INTO settings VALUES('paypal_cost','0.00');
INSERT INTO settings VALUES('enable_stripe','false');
INSERT INTO settings VALUES('stripe_key','');
INSERT INTO settings VALUES('stripe_currency','EUR');
INSERT INTO settings VALUES('stripe_cost','0.00');
INSERT INTO settings VALUES('social_verification','false');
INSERT INTO settings VALUES('social_pay','true');
INSERT INTO settings VALUES('enable_google','false');
INSERT INTO settings VALUES('client_id','');
INSERT INTO settings VALUES('client_secret','');
INSERT INTO settings VALUES('api_key','');
INSERT INTO settings VALUES('enable_facebook','false');
INSERT INTO settings VALUES('fb_appid','');
INSERT INTO settings VALUES('fb_appsecret','');
INSERT INTO settings VALUES('enable_twitter','false');
INSERT INTO settings VALUES('consumer_key','');
INSERT INTO settings VALUES('consumer_secret','');
INSERT INTO settings VALUES('public_profiles','false');




DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `avatar` text NOT NULL,
  `password` text NOT NULL,
  `registered_on` text NOT NULL,
  `last_login` text NOT NULL,
  `ip` text NOT NULL,
  `permission` text NOT NULL,
  `active` text NOT NULL,
  `activate_code` text NOT NULL,
  `paypal` text NOT NULL,
  `banned` text NOT NULL,
  `type` text NOT NULL,
  `sid` text NOT NULL,
  `Country` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES('1','admin','admin@admin.nl','','GPVGgPx0UxZS+e1MBDC5qdIrGYtAvdMRfV4b45sdyE6y6jRJNlBd8blH1I3fyduLFtpXyXSQd1tU8QVBRFp0vMOC8b6aeha/KMALjP9H9QAd2u/Ijd9fVxAHwfowWYeCg8EAvYTcu8rUFKWhka3P4DKImbOo33qRjoiUuCF63o8=','','','','1','1','c6cd9e1980989b23b86f12e7b7e93ace','','','website','','');
