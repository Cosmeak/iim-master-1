package com.example.android_kotlin.model.repository

import com.example.android_kotlin.model.Movie
import com.example.android_kotlin.model.MovieResponse
import com.example.android_kotlin.model.interfaces.ApiService
import retrofit2.Response

class MovieRepository(private val apiService: ApiService) {
    suspend fun getPopularMovies(apiKey: String, page: Int): Response<MovieResponse> {
        return apiService.getPopularMovies(apiKey, page)
    }

    suspend fun getMovieById(movieId: Int, apiKey: String): Response<Movie> {
        return apiService.getMovieById(movieId, apiKey)
    }
}