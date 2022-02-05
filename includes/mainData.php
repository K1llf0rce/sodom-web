<?php 
    $hostnameVar = shell_exec("cat /proc/sys/kernel/hostname");
    $uptimeVar = shell_exec("uptime -p | cut -d ' ' -f 2-");
    $ipVar = shell_exec("ip a | grep -m 2 -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'");
    $osName = shell_exec("cat /etc/os-release | grep -w 'NAME=' | cut -d '=' -f 2 | tr -d '\"'");
    $kernelVer = shell_exec("uname -r")
?>