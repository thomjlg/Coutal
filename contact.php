<?php  
//Ecrivez votre adresse e-mail entre les guillemets  
$destinataire='contact@coutal.com';
?>
<!DOCTYPE html>


<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<title>COUTAL | Le singulier est de mise</title>
<meta name="description" content="Coutal, entreprise spécialisée dans la réalisation de couteaux personnalisés.">
<link rel="shortcut icon" type="image/png" href="logo.png"/>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>


<body>
<center>
<div class=rubriques3>
<header><p></p>
<img src="logo.png" width=30%;/>
<hr>
<table class=tablemenu>
<tr>
<td class=tdmenu1>
<div class="menu" >
<ul>
<li> <a class=amenu href="index.html">ACCUEIL  </a> </li> <i class="fas fa-utensils" style="font-size:11px;"></i>
<li> <a class=amenu href="">NOUS CONTACTER  </a> </li>
</ul>
</div>
</td>
<td class=tdmenu2>
<div class="langue">
<a class=amenu href="#" target=_blank>
<i class="fas fa-shopping-cart" style="font-size:25px;"></i>
</a>
</div>
</td>
</tr>
</table>
</header>
</div>

<div class=ru>
<h1><i>" Nos couteaux sont uniques, le singulier est donc de mise. "</i></h1>
</div>

<div class=photobg></div>

<div class=rub>
<h1>Nous contacter</h1>
<table class=table2>
		<tr>
			<td class="td3c"><b><font color=black>Réseaux sociaux et mail</font></b><br /><br /><br /><br />
				
                <table class=rsocialtab>

                <tr>
                    <td class=tdsocial><a class=amenu href="https://www.facebook.com/coutal" target=_blank>
                    <i class="fab fa-facebook-f"></i>
                    </a></td>

                    <td class=tdsocialt>
                    <a class=amenu href="https://www.facebook.com/coutal" target=_blank>
                    Coutal
                    </a></td>
                </tr>

                <tr>
                    <td class=tdsocial><a class=amenu href="https://twitter.com/@Coutal" target=_blank>
                    <i class="fab fa-twitter"></i>
                    </a></td>

                    <td class=tdsocialt>
                    <a class=amenu href="https://twitter.com/@Coutal" target=_blank>
                    @Coutal
                    </a></td>
                </tr>

                <tr>
                    <td class=tdsocial><a class=amenu href="https://www.instagram.com/coutal" target=_blank>
                    <i class="fab fa-instagram"></i>
                    </a></td>
                    <td class=tdsocialt>
                    <a class=amenu href="https://www.instagram.com/coutal" target=_blank>
                    coutal
                    </a></td>
                </tr>

                <tr><td class=tdsocial>
                    Vous pouvez également partager vos publications Coutal avec les hashtags
                    </td>
                    <td class=tdsocialt>
                    <b>#coutal <br /> #lesingulierestdoncdemise </b>
                    </td></tr>
        </table>
				<br /><br />
				
			</td>
			
<td class="td3c2"><b><font color=black>Formulaire de contact</font></b><br />
			<br />
			<br />
			
			
			<?php  
$Envoi="\n".'<p><button  class="bouton" name="envoi" type="submit" value="Submit" ><b>Envoyer votre message</b></button></p>';
if (isset($_POST['message']))  
  {  
    // La variable $verif va nous permettre d'analyser si la sémantique de l'email est bonne  
    $verif='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';  
    //quelques remplacements pour les specialchars  
    $message=preg_replace('#(<|>)#', '-', $_POST['message']);  
    $message=str_replace('"', "'",$message);  
    $message=str_replace('&', 'et',$message);  
    $objet=preg_replace('#(<|>)#', '-', $_POST['objet']);  
    $objet=str_replace('"', "'",$objet);  
    $objet=str_replace('&', 'et',$objet);  
    // On assigne et/ou protège nos variables  
    $votremail=stripslashes(htmlentities($_POST['votremail']));  
    $message=stripslashes(htmlspecialchars($message));  
    $objet=stripslashes(htmlspecialchars($objet));  
    //input envoi/previsualiser  
    $envoi=htmlentities($_POST['envoi']);   
    //on enlève les espaces  
    $votremail=trim($votremail);  
    $message=trim($message);  
    $objet=trim($objet);  

    $apercu_resultat='<p>Aperçu du résultat :</p>';  

    /*On vérifie si l'e mail et le message sont pleins, et on agit en fonction.  
      (on affiche Apercu du resultat, tel ou tel champ est vide, etc...*/  
    //Si ca ne vas pas (mal rempli, mail non valide...)  
    if((empty($message))or(empty($objet))or(!preg_match($verif,$votremail)))  
      {  
        //les 3 champs sont vides  
        if(empty($votremail)and(empty($message))and(empty($objet)))  
          {  
            echo '<p><font color=red>Tous les champs sont vides.</font></p>';  
            $message='';$votremail='';$objet='';$apercu_resultat='';  
          }  
        //un des champs est vide  
        else  
          {  
            if(!preg_match($verif,$votremail))  
              echo'<p><font color=red>Votre adresse e-mail n\'est pas valide.</font></p>';  
            else  
            {  
              echo'<p><font color=red>Il faut remplir tous les champs !</font></p>';  
              if(empty($message))  
                $apercu_resultat='';  
            }  
          }  
      }  
    //Si les deux sont pleins et que l'adresse est valide, on envoie on on prévisualise sans envoi  
    else  
      {  
        $domaine=preg_replace('#[^@]+@(.+)#','$1',$votremail);  
        $DomaineMailExiste=checkdnsrr($domaine,'MX');  
        if(!$DomaineMailExiste)  
          echo'<p><font color=red>Le nom de domaine de l\'adresse e-mail que vous avez donné n\'existe pas.</font></p>';  
         
        elseif(!empty($envoi))  
            {  
              $objet='[COUTAL] '.$nom .' | ' .$objet;
              $headers='From:'.$votremail."\r\n".'To:'.$mail."\r\n".'Subject:'.$objet."\r\n".'Content-type:text/plain;charset=iso-8859-1'."\r\n".'Sent:'.date('l, F d, Y H:i');  
              if(mail($destinataire,$objet,$message,$headers))  
              {  
                echo '<p><font color=black>'.$nom.', merci de nous avoir contacté. Votre message a bien été envoyé. </p><p><a href="index.html">Retour à la page d\'accueil</a></font></p>';  
                $Envoi='';  
                $Previsualiser='';  
              }  
              else  
                echo'<p><font color=red>Un problème est survenu durant l\'envoi du mail.</font></p>';  
            }  
        else  
          echo'<p><font color=red>Une condition innatendue est survenue lors de l\'exécution du script.</font></p>';  
      }  
  }  
else  
  {    
  $votremail='';$message='';  
  }  
$bas_formulaire=$Envoi;  
?>  
<form id='contact' method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">  
  <label for='nom'> 
  <input class="contactform" type='text' name='nom' id='nom' required="required" placeholder="Nom. "size='40' value="<?php echo $nom; ?>"> </label>  
&nbsp;
  <label for="mail"> 
  <input  class="contactform" name="votremail" required="required"  placeholder="Email. " size="55" type="text" id="mail" value="<?php echo $votremail; ?>"></label>
  <br /><br />  
  <label for='objet'> 
  <input  class="contactform" type='text' name='objet' required="required" id='objet' placeholder="Objet de votre demande. " size='100' value="<?php echo $objet; ?>"></label>
  
  <p id="msg"><label for="message"> 
  <textarea  class="contactform" placeholder="Message. " required="required" rows='5' cols='81' name="message" id="message"><?php echo $message; ?></textarea>  
  </label></p> 
<?php echo $bas_formulaire;?>  
</form>  
			
			</td>
		</tr>
	</table>
<br /><br />
<h1>Situation géographique</h1><p>La Talaudière - Loire - FR</p>
        <img src="localisation.png" width="80%" />

</div>

<div class=photobgg></div>

<footer><hr>
<div class=copyright>
&copy; 2019.&nbsp;&nbsp;&nbsp;COUTAL® <br /> <a href="mailto:contact@coutal.com">contact@coutal.com</a>
</div>
<div class=footersocial>
<a class=amenu href="https://www.facebook.com/coutal" target=_blank><i class="fab fa-facebook-f"></i></a>&nbsp;&nbsp;&nbsp;
<a class=amenu href="https://twitter.com/@Coutal" target=_blank><i class="fab fa-twitter"></i></a>&nbsp;&nbsp;&nbsp;
<a class=amenu href="https://www.instagram.com/coutal" target=_blank><i class="fab fa-instagram"></i></a>&nbsp;&nbsp;&nbsp;
<a class=amenu href="mailto:contact@coutal.com" target=_blank><i class="fas fa-envelope"></i></a>
</div>
</footer>

</center>
</body>
