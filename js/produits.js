popup = document.getElementsByClassName("fond");
phd = document.getElementById('phd');
html = document.getElementsByTagName('html');

function coucou(){
    html[0].style.overflowY='hidden';
    phd.innerHTML=`<div class="fond">
    <div class="popup">
        <div class="flex2">
            <img id="image2" src="" alt="page matériel">
        <div class="texte">
            <h3 id="titre"></h3>
            <div class="autre">
                <p id='mini'></p>
            </div>                
        <div class="description">
            <p id='p1'></p>
            <div class="voir">
                <form method="GET" action='reserver.php'>
                <input type="text" name="rel" value='' id='ici' style="visibility:hidden;"></input>
                <input type="submit" value="Réserver" id="bt"></input>
            </form>
            </div>
        </div>
        </div>
        <img onclick="quit()" id="croix" src="ressources/cross.png" alt="fermer l'onglet">
        </div>
    </div>
    </div>`
}

function pc(val){
    switch(val){
        case 'NUMPC':
            coucou();
            document.getElementById('image2').src="ressources/materiel/pc.jpg";
            document.getElementById('titre').innerText='Les PC Gaming Dell';
            document.getElementById('mini').innerText=`PC dernière génération adaptés aux jeux vidéos.`;
            document.getElementById('ici').value = 'NUMPC';
            document.getElementById('p1').innerText=`Disque dur:1To SSD M2 NVME 
            RAM:64 Go DDR4
            Carte Graphique:Nvidia Quadro RTX 4000 8Go
            Processeur:Intel Xeon Silver 4210`;
            break;
        case 'NUMCASVR':
            coucou();
            document.getElementById('image2').src="ressources/materiel/casque_vr";
            document.getElementById('titre').innerText='Les casques Oculus Quest 2';
            document.getElementById('mini').innerText=`Casque de réalité virtuelle tout-en-un, utilisable avec ou sans fil.`;
            document.getElementById('ici').value = 'NUMCASVR';
            document.getElementById('p1').innerText=`Stockage:256 Go
            RAM: 6 Go
            Processeur: Qualcomm Snapdragon XR2
            écran LCD: résolution de 1832 x 1920 pixels par oeil
            Haut-parleurs: intégrés pour une immersion à 360°
            Angle de vision: 120° (horizontal)
            Chaque casque est accompagné de:
            2 manettes Touch
            Câble de chargement
            Adaptateur secteur
            Espacement pour lunettes
            Câble Oculus Link (pour le lier au PC, pratique pour le développement)`;
            break;
        case "NUMCAM":
            coucou();
            document.getElementById('image2').src="ressources/materiel/camera_360.jpg";
            document.getElementById('titre').innerText='Caméra 360°';
            document.getElementById('mini').innerText=`Caméra 360° vidéo 4K avec coque rigide`;
            document.getElementById('ici').value = 'NUMCAM';
            document.getElementById('p1').innerText=`Type de capteur :CMOS
            Résolution : 14,4 Mégapixels
            Stockage : 14 Go
            Format d'enregistrement : MP4
            Qualité d'enregistrement: Ultra HD (4K)
            WiFi : Oui
            Bluetooth :Oui
            Transfert sur smartphone : Oui
            Contrôle à distance via smartphone : Oui
            Application dédiée gratuite : Theta / Theta +`;
            break;
        case "NUMWCAM":
            coucou();
            document.getElementById('image2').src="ressources/materiel/webcam.jpg";
            document.getElementById('ici').value = 'NUMWCAM';
            document.getElementById('titre').innerText='Webcam Logitech Brio 4K';
            document.getElementById('mini').innerText=`Cette webcam est pratique pour le développement en réalité augmentée, avec Unity 3D et Vuforia.`;
            document.getElementById('p1').innerText=`Interface avec l'ordinateur : USB 3.0
            Sans-fil : Non
            Type de capteur : CMOS
            Résolution vidéo : 3840 x 2160 pixels
            Microphone intégré: Oui`;
            break;
        case "NUMPI":
            coucou();
            document.getElementById('image2').src="ressources/materiel/trepied.jpg";
            document.getElementById('titre').innerText='Trépied + support smartphone et tablette';
            document.getElementById('ici').value = 'NUMPI';
            document.getElementById('mini').innerText=`Idéal pour la fixation de la caméra 360° ou d'un smartphone/tablette`;
            document.getElementById('p1').innerText=`Charge maximale : 4 kg
            Corps de trépied en magnésium avec 3 positions de réglage 
            Hauteur max (24°) avec colonne dépliée : 57.6 cm
            Hauteur max (24°) avec colonne repliée : 48.4 cm
            Hauteur min : 15.7 cm
            Hauteur max : 57.6 cm
            Taille replié : 20.1 cm
            Système de verrouillage : bague à vis
            Tête rotule amovible 
            Plateau rapide en aluminium anodisé 
            Diamètre colonne centrale : 20 mm
            Niveau à bulle 
            Avec housse de transport
            Poids : 2.6 kg`;
            break;
        case "NUMMIC":
            coucou();
            document.getElementById('image2').src="ressources/materiel/micro.jpg";
            document.getElementById('titre').innerText='Microphone HYPERX QUADCAST';
            document.getElementById('ici').value = 'NUMMIC';
            document.getElementById('mini').innerText=`Pour enregistrer des sons lors du développement de jeux vidéos.`;
            document.getElementById('p1').innerText=`Sélection entre quatre diagrammes polaires
            Pied amortisseur contre les vibrations
            Capteur de fonction mute par pression et témoin LED
            Molette de réglage du contrôle de gain pratique
            Filtre anti-pop interne
            Prise casque intégrée
            Compatibilité multi-dispositif et chat
            Contient un adaptateur de pied`;
            break;
        case "NUMCAS":
            coucou();
            document.getElementById('image2').src="ressources/materiel/casque.jpg";
            document.getElementById('ici').value = 'NUMCAS';
            document.getElementById('titre').innerText='Casque STEELSERIES ARCTIS 5';
            document.getElementById('mini').innerText=`Casque son surround avec rétroéclairage RGB personnalisable.`;
            document.getElementById('p1').innerText=`Casque au son DTS Headphone : X v2.0 Surround avec rétroéclairage RGB personnalisable (16.8 millions de couleurs)
            Microphone bidirectionnel rétractable avec suppression du bruit
            Connecteur : USB ou jack 3.5 mm 4 pôles
            Contrôle audio via télécommande filaire
            Bandeau de suspension s'adaptant à toutes les formes de tête
            Logiciel SteelSeries Engine 3`;
            break;
        case "NUMPRO" :
            coucou();
            document.getElementById('ici').value = 'NUMPRO';
            document.getElementById('image2').src="ressources/materiel/videoproj.jpg";
            document.getElementById('titre').innerText='Vidéoprojecteur laser';
            document.getElementById('mini').innerText=`Vidéoprojecteur laser focale ultra-courte full HD.`;
            document.getElementById('p1').innerText=`Vidéoprojecteur DLP Full HD
            Luminosité : 1500 Lumens
            Focale ultra-courte : image de 90" avec recul de 8 cm / 120" avec recul de 20 cm
            Correction manuelle de la distorsion trapézoïdale (H/V)
            Prise en charge d'un son Dolby Audio et DTS-HD
            Smart Share : Miracast, Contents Sharing
            Bluetooth audio
            webOS 4.0
            Lecteur multimédia intégré via port USB
            Connectiques : HDMI x2, USB, S/PDIF Optique, Fast Ethernet`;
            break;
    }
}
function quit(){
    html[0].style.overflowY='visible';
    phd.innerHTML=``;
}

document.addEventListener('keydown', keyPress);
function keyPress(e){
    if(e.keyCode === 27){
        quit();
    }
}