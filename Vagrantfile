# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.10.10"
    config.vm.hostname = "scotchbox"


    # You can choose to use regular folder syncing or NFS syncing. NFS is meant to be "better" but I've faced problems
    # with it failing to sync every now and again.
    config.vm.synced_folder ".", "/var/www", :mount_options => ["dmode=777", "fmode=666"]
    #config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }

    # Provisiong the virtual machine with a bash script.
    config.vm.provision "shell", path: "./provisioning/provision.sh"

end
