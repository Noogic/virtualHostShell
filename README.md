# virtualHostShell
Shell for create virtual host using nginx

This is (will be) a tool for creating virtual host in an nginx environment.

Coming from an apache environment with mod_php, suexec or something similar, to one with nginx on one hand and php-fpm on the other, can be baffling.

After some time working with nginx and fpm, trying to understand how they work and what does each part of the configuration, I've needed some tool for create virtualhosts.
The tools i've tried comes with their own fpm, nginx, mysql, etc and also their own configuration, but what I want is to install that on my own and only automate the creation of virtualhost.

So, this tool aims that. Create virtualhost in an installed and configured envirnonment.

Right now, is in *develop*, which means is not working yet.

**The roadmap**

- [ ] Create new host from shell for a domain with shared user
- [ ] Create new host from shell for a domain with its own user
- [ ] Create new host from shell for a subdomain with shared user
- [ ] Create new host from shell for a subdomain with its parent user
- [ ] Create new host from shell for a subdomain with its own user
- [ ] Add the option to the host to work with wordpress and other CMS
- [ ] Create an administration webpanel for all the above cases
- [ ] Modify existing configuration hosts from the administration webpanel
