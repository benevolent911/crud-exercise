<?php

namespace RioLibrary\Policies;

use RioLibrary\User;
use RioLibrary\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;    

    public function view(User $user)
    {
       if($user->role == 'admin')
            return true;
    }

    /**
     * Determine whether the user can create books.
     *
     * @param  \RioLibrary\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->role == 'admin')
            return true;
    }

    /**
     * Determine whether the user can store books.
     *
     * @param  \RioLibrary\User  $user
     * @return mixed
     */
    public function store(User $user)
    {
        if($user->role == 'admin')
            return true;
    }
        
    /**
     * Determine whether the user can edit books.
     *
     * @param  \RioLibrary\User  $user
     * @return mixed
     */
    public function edit(User $user)
    {
        if($user->role == 'admin')
            return true;
    }
    
    /**
     * Determine whether the user can update the book.
     *
     * @param  \RioLibrary\User  $user
     * @param  \RioLibrary\Book  $book
     * @return mixed
     */
    public function update(User $user, Book $book)
    {        
       if($user->role == 'admin')
        return true;
    }

    /**
     * Determine whether the user can delete the book.
     *
     * @param  \RioLibrary\User  $user
     * @param  \RioLibrary\Book  $book
     * @return mixed
     */
    public function destroy(User $user, Book $book)
    {
        if($user->role == 'admin')
            return true;
    }

    public function borrowBook(User $user, Book $book)
    {
        if($user->role == 'user')
            return true;
    }

    public function returnBook(User $user, Book $book)
    {
        return $user->id === $book->user_id;            
    }

    public function borrowedBooks(User $user)
    {
        if($user->role == 'user')
            return true;
    }
}