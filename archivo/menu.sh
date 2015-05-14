#!/bin/bash
echo 'Digite Opccion: '
options=("Usuarios" "Crear Usuario" "Backup Usuario" "Salir")
select opc in "${options[@]}"
do
    case $opc in
        "Usuarios")
          cat /etc/passwd | cut -d":" -f1 
            ;;
        "Crear Usuario")
            echo "Digite Nombre de Usuario"
                read nombre
                adduser  $nombre 
            ;;
        "Backup Usuario")
            echo "Digite_Usuario"
            read nom
            cd /home
            sudo tar -zcvf $nom.tar.gz /home/$nom
            ;;
        "Salir")
            break
            ;;
        *) echo "Invalido";;
    esac
done
