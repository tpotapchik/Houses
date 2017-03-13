# How to run this project on Vagrant
## Project requirements
* Vagrant >= 1.9
* Virtualbox >= 5.1
* Linux any dist

Also needed some additional plugins for Vagrant
* vagrant-vbguest - need to keep Virtualbox's guest additions up to date

`$ vagrant plugin install vagrant-vbguest`
* vagrant-hostsupdater - need to have a nice URI's like http://my-site.loc

`$ vagrant plugin install vagrant-hostsupdater`

## Let's start
Just run
`$ vagrant up` and enjoy!