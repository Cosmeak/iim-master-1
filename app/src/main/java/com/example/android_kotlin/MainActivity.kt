package com.example.android_kotlin

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.activity.compose.setContent
import androidx.compose.runtime.Composable
import androidx.lifecycle.Observer
import androidx.lifecycle.ViewModelProvider
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import androidx.navigation.compose.rememberNavController
import com.example.android_kotlin.model.Movie
import com.example.android_kotlin.model.interfaces.ApiService
import com.example.android_kotlin.model.repository.MovieRepository
import com.example.android_kotlin.view.HomePage
import com.example.android_kotlin.viewmodel.MovieViewModel
import com.example.android_kotlin.viewmodel.MovieViewModelFactory
import com.example.myapplication.BuildConfig
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory

class MainActivity : AppCompatActivity() {

    private lateinit var movieViewModel: MovieViewModel
    private val repository: MovieRepository by lazy {
        val apiService = Retrofit.Builder()
            .baseUrl(BuildConfig.BASE_URL)
            .addConverterFactory(GsonConverterFactory.create())
            .build()
            .create(ApiService::class.java)
        MovieRepository(apiService)
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        movieViewModel = ViewModelProvider(this, MovieViewModelFactory(repository))
            .get(MovieViewModel::class.java)

        movieViewModel.movies.observe(this, Observer { movies ->
            setContent {
                RetroStreamApp(movies)
            }
        })
    }
}

@Composable
fun RetroStreamApp(movies: List<Movie>) {
    val navController = rememberNavController()
    NavHost(navController = navController, startDestination = "home") {
        composable("home") { HomePage(navController, movies) }
    }
}
