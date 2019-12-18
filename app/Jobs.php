<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    public function adminPath() {
        return url("/job-details/{$this->id}-" . Str::slug($this->job_title));
    }

    public function adminEditPath() {
        return url("/edit-job/{$this->id}-". Str::slug($this->job_title));
    }

    public function userPath() {
        return url("/job-d/{$this->id}-". Str::slug($this->job_title));
    }
}
