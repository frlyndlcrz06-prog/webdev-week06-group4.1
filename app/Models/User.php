<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory; // Factory class.
use Illuminate\Database\Eloquent\Attributes\Fillable; // Fillable attribute.
use Illuminate\Database\Eloquent\Attributes\Hidden; // Hidden attribute.
use Illuminate\Database\Eloquent\Factories\HasFactory; // Factory trait.
use Illuminate\Foundation\Auth\User as Authenticatable; // Base user model.
use Illuminate\Notifications\Notifiable; // Notification trait.

#[Fillable(['name', 'email', 'password'])] // Allowed fields.
#[Hidden(['password', 'remember_token'])] // Hidden fields.
class User extends Authenticatable // User model.
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable; // Model traits.

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array // Attribute casts.
    {
        return [
            'email_verified_at' => 'datetime', // Verification date.
            'password' => 'hashed', // Hashed password.
        ];
    }
}
