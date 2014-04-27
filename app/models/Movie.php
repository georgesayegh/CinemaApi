<?php
/**
 * Movie Model Class
 *
 * PHP version 5.4
 *
 * LICENSE: This file is a property of Digital Pacific Pty Ltd
 *
 * @category  CinemaApp
 * @package   Movie
 * @author    George Sayegh <george.sayegh@digitalpacific.com.au>
 * @copyright 2014 Digital Pacific Pty Ltd
 * @license   http://www.digitalpacific.com.au Digital Pacific License
 * @link      http://docs.digitalpacific.com/
 */
class Movie extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'movies';
}
