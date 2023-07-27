<?php

namespace App\Component\Interface;

interface Migration
{
    public function up();
    public function down();
}