# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.10.10"
    config.vm.hostname = "xdesign"

    config.vm.synced_folder ".", "/var/www"

    # Provisioning the virtual machine with a bash script.
    config.vm.provision "shell", path: "./provisioning/provision.sh"

end
