# -*- mode: ruby -*-
require 'yaml'
require 'rbconfig'
# vi: set ft=ruby :

# Read YAML config file
config_yml = YAML.load_file('provisions/vars/config.yml')

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://atlas.hashicorp.com/search.
  config.vm.box = config_yml['vagrant_box']

  config.hostsupdater.aliases = [config_yml["vhost_domain"]]

  config.vm.hostname = config_yml["vagrant_hostname"]

  config.vm.network(:private_network, {:ip=>config_yml["vagrant_ip"]})

  config.vm.provider config_yml["vagrant_provider"] do |vb|

    vb.memory = config_yml['vagrant_memory']

  end

  #config.vm.synced_folder config_yml["houses_synced_folder"], config_yml["houses_project_root"], type: config_yml["houses_sync_type"]

  # Provisioning configuration for Ansible
  config.vm.provision "prepare_environment", type: "ansible_local" do |ansible|
    ansible.playbook = "provisions/init.yml"
  end

  config.vm.provision "deploy_houses", type: "ansible_local" do |ansible|
    ansible.playbook = "provisions/deploy_houses.yml"
  end


end
