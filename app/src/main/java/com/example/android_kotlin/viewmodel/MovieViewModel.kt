package com.example.android_kotlin.viewmodel

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import com.example.android_kotlin.model.Movie
import com.example.android_kotlin.model.repository.MovieRepository
import com.example.myapplication.BuildConfig
import kotlinx.coroutines.launch

class MovieViewModel(private val repository: MovieRepository) : ViewModel() {

    private val apiKey = BuildConfig.API_KEY
    private val currentPage = 1

    private val _movies = MutableLiveData<List<Movie>>()
    val movies: LiveData<List<Movie>> get() = _movies
    private val _selectedMovie = MutableLiveData<Movie>()
    val selectedMovie: LiveData<Movie> get() = _selectedMovie

    init {
        viewModelScope.launch {
            fetchPopularMovies()
        }
    }

    private suspend fun fetchPopularMovies() {
        val response = repository.getPopularMovies(apiKey, currentPage)
        if (response.isSuccessful) {
            _movies.postValue(response.body()?.results)
        } else {
            // error
        }
    }

    fun setSelectedMovie(movie: Movie) {
        _selectedMovie.value = movie
    }

    suspend fun fetchMovieById(movieId: Int) {
        val response = repository.getMovieById(movieId, apiKey)
        if (response.isSuccessful) {
            _selectedMovie.postValue(response.body())
        } else {
            // error
        }
    }
}
