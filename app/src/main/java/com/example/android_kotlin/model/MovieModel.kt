package com.example.android_kotlin.model

data class Movie(
    val id: Int,
    val title: String,
    val overview: String,
    val poster_path: String,
    val vote_average: Double
)

data class MovieResponse(
    val results: List<Movie>
)