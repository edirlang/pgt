echo "Edixon Hernandez Codigo 161212122" 
echo "1. Crear Usuario"
echo "2. Backup usuario"
echo "3. Listar usuarios"
echo "4. Salir"

read opcion
if [ $opcion -eq "3" ]; then
 cat /etc/passwd | cut -d ':' -f1
elif [ $opcion -eq "1" ]; then
 echo "Nombre de Usuario"
 read nombre
 sudo adduser $nombre
elif [ $opcion -eq "2" ]; then
 echo "copia de seguridad"
 echo "Usuario"
 read nom
 cd /home
 sudo tar -zcvf $nom.tar.gz /home/$nom
elif [ $opcion -eq "4" ]; then
 echo "saliendo"
else
 echo "otra opcion"
fi
