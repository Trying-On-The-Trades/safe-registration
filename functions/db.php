<?php

function get_school_table_name(){
    global $wpdb;
    return $wpdb->prefix . "pano_schools";
}

function get_domain_table_name(){
    global $wpdb;
    return $wpdb->prefix . "pano_domains";
}

function get_tool_table_name(){
    global $wpdb;
    return $wpdb->prefix . "pano_tools";
}

function build_school_sql(){
    $table_name = get_school_table_name();

    $sql = 'CREATE TABLE ' .$table_name. ' (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL DEFAULT "",
        PRIMARY KEY (`id`)
    );';

    return $sql;
}

function build_domains_sql(){
    $table_name = get_domain_table_name();

    $sql = 'CREATE TABLE ' .$table_name. ' (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL DEFAULT "",
        PRIMARY KEY (`id`)
    );';

    return $sql;
}

function build_tools_sql(){
    $table_name = get_tool_table_name();

    $sql = 'CREATE TABLE ' .$table_name. ' (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `domain_id` int(11) NOT NULL,
        `name` varchar(255) NOT NULL DEFAULT "",
        PRIMARY KEY (`id`)
    );';

    return $sql;
}