package com.example.android_kotlin.model

data class Movie(
    val id: Int,
    val title: String,
    val overview: String,
    val poster_path: String,
    val vote_average: Double,
    val original_language: String,
    val release_date: String,
    val vote_count: Int
)

data class MovieResponse(
    val results: List<Movie>
)