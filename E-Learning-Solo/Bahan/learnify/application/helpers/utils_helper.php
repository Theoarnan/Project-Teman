<?php

function convertGuru($id)
{
	$CI = &get_instance();
	$covert = $CI->db->query("select nama_guru as nama_guru from guru where nip = '$id'");
	return $covert->row()->nama_guru;
}

function convertMapel($id)
{
	$CI = &get_instance();
	$covert = $CI->db->query("select nama_mapel as nama_mapel from mapel where id = '$id'");
	return $covert->row()->nama_mapel;
}
