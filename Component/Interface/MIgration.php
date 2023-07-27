<?php

namespace App\Component\Interface;

interface MIgration
{
    public function up();
    public function down();
}