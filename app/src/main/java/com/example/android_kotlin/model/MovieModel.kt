package com.example.android_kotlin.model

data class Movie(
    val id: Int,
    val title: String,
    val overview: String,
    val posterPath: String
)

data class MovieResponse(
    val results: List<Movie>
)