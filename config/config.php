<?php

//PENGATURAN CORE---------------------------------------------------------------
$Link_Website = "http://192.168.1.11:1201/";
$Link_Sekarang = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//UNTUK ALVAMITRA
$Link_Website_Alvamitra = "http://192.168.1.11:1101/";
// $Link_Website_Alvamitra = "http://localhost/SynologyDrive/ALVAMITRA/";
//UNTUK ALVAMITRA

//API KEY DELIVEREE---------------------------------------------------------------
$api_key_deliveree = "8n_zVu5EF2dY26NmqY-e"; //STAGING
$url_api_deliveree = "https://api.sandbox.deliveree.com"; //STAGING

//SNAPSHOT
//-------------------------------------------------------------------------------
$s3_facility_management_snapshot_device = "https://facility-management-staging.s3-ap-southeast-1.amazonaws.com/master/talos_fm/media/fm_location_camera/snapshot_device/";
$s3_facility_management_asset_snapshot_device = "https://facility-management-staging.s3-ap-southeast-1.amazonaws.com/master/talos_fm/media/fm_asset_snapshot_location/";
$s3_facility_management_work_order_snapshot_device = "https://facility-management-staging.s3-ap-southeast-1.amazonaws.com/master/talos_fm/media/fm_work_order_snapshot_location/";

//FORM
//-------------------------------------------------------------------------------
$s3_talos_form_directory_form_builder = "https://facility-management-staging.s3-ap-southeast-1.amazonaws.com/master/talos_form/media/form_builder/";

// JMP OPERATIONAL
$s3_jmp_operational_pengajuan = "https://smartjmp-staging.s3-ap-southeast-1.amazonaws.com/master/jmp_operational/media/operational_pengajuan/";