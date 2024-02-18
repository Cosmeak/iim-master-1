package com.example.android_kotlin.view

import androidx.compose.foundation.layout.padding
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.LaunchedEffect
import androidx.compose.ui.Modifier
import androidx.compose.ui.unit.dp
import androidx.lifecycle.viewmodel.compose.viewModel
import androidx.navigation.NavController
import com.example.android_kotlin.model.Movie
import com.example.android_kotlin.model.interfaces.ApiService
import com.example.android_kotlin.model.repository.MovieRepository
import com.example.android_kotlin.viewmodel.MovieViewModel
import com.example.android_kotlin.viewmodel.MovieViewModelFactory
import com.example.myapplication.BuildConfig
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory

@Composable
fun MovieDetailScreen(navController: NavController, movieId: Int) {
    val repository: MovieRepository by lazy {
        val apiService = Retrofit.Builder()
            .baseUrl(BuildConfig.BASE_URL)
            .addConverterFactory(GsonConverterFactory.create())
            .build()
            .create(ApiService::class.java)
        MovieRepository(apiService)
    }

    val viewModel: MovieViewModel = viewModel(factory = MovieViewModelFactory(repository))

    LaunchedEffect(movieId) {
        viewModel.fetchMovieById(movieId)
    }

    val selectedMovie = viewModel.selectedMovie.value

    if (selectedMovie != null) {
        SelectedMovieDetail(selectedMovie)
    } else {
        // If inaccessible
    }
}

@Composable
fun SelectedMovieDetail(movie: Movie) {
    Text(
        text = movie.title,
        modifier = Modifier.padding(16.dp)
    )
}


