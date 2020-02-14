<?php
 header('Content-Type: application/json');
 
 include("functions/connect_db.php");
 include("functions/query.php"); 

 $connection= conn_db("STROM");

 $nameset			= $_POST['KEY'];
 $pv1_scale			= $_POST['W01'];
 $pv1_targetvalue		= $_POST['W02'];
 $pv1_targetvaluep		= $_POST['W03'];
 $pv1_colorthreshold		= $_POST['W04'];
 $pv1_threshold1		= $_POST['W05'];
 $pv1_threshold1_color		= $_POST['W06'];
 $pv1_threshold2		= $_POST['W07'];
 $pv1_threshold2_color		= $_POST['W08'];
 $pv1_threshold3		= $_POST['W09'];
 $pv1_threshold3_color		= $_POST['W10'];
 $pv1_threshold4		= $_POST['W11'];
 $pv1_threshold4_color		= $_POST['W12'];
 $vb1_scale			= $_POST['W13'];
 $vb1_targetvalue		= $_POST['W14'];
 $vb1_targetvaluep		= $_POST['W15'];
 $vb1_colorthreshold		= $_POST['W16'];
 $vb1_threshold1		= $_POST['W17'];
 $vb1_threshold1_color		= $_POST['W18'];
 $vb1_threshold2		= $_POST['W19'];
 $vb1_threshold2_color		= $_POST['W20'];
 $vb1_threshold3		= $_POST['W21'];
 $vb1_threshold3_color		= $_POST['W22'];
 $vb1_threshold4		= $_POST['W23'];
 $vb1_threshold4_color		= $_POST['W24'];

 $query = "UPDATE STROM_EINSTELLUNGEN SET 
				pv1_scale            = '$pv1_scale',
                                pv1_targetvalue      = '$pv1_targetvalue',
				pv1_targetvaluep     = '$pv1_targetvaluep',
                                pv1_colorthreshold   = '$pv1_colorthreshold',
                                pv1_threshold1       = '$pv1_threshold1',
                                pv1_threshold1_color = '$pv1_threshold1_color',
                                pv1_threshold2       = '$pv1_threshold2',
                                pv1_threshold2_color = '$pv1_threshold2_color',
                                pv1_threshold3       = '$pv1_threshold3',
                                pv1_threshold3_color = '$pv1_threshold3_color',
                                pv1_threshold4       = '$pv1_threshold4',
                                pv1_threshold4_color = '$pv1_threshold4_color',
                                vb1_scale            = '$vb1_scale',
                                vb1_targetvalue      = '$vb1_targetvalue',
				vb1_targetvaluep     = '$vb1_targetvaluep',
                                vb1_colorthreshold   = '$vb1_colorthreshold',
                                vb1_threshold1       = '$vb1_threshold1',
                                vb1_threshold1_color = '$vb1_threshold1_color',
                                vb1_threshold2       = '$vb1_threshold2',
                                vb1_threshold2_color = '$vb1_threshold2_color',
                                vb1_threshold3       = '$vb1_threshold3',
                                vb1_threshold3_color = '$vb1_threshold3_color',
                                vb1_threshold4       = '$vb1_threshold4',
                                vb1_threshold4_color = '$vb1_threshold4_color'
				WHERE nameset = '$nameset'";
 

 $ergebnis_pv = mysql_query($query);
 mysql_close($connection);
?>
