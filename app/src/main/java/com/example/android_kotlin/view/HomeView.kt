package com.example.android_kotlin.view

import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.items
import androidx.compose.material3.Button
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.unit.dp
import androidx.navigation.NavController
import com.example.android_kotlin.model.Movie

@Composable
fun HomePage(navController: NavController, movies: List<Movie>) {
    LazyColumn {
        items(movies) { movie ->
            MovieItem(movie = movie) {
                navController.navigate("movieDetail/${movie.id}")
            }
        }
    }
}

@Composable
fun MovieItem(movie: Movie, onMovieSelected: () -> Unit) {
    Column(
        modifier = Modifier
            .fillMaxWidth()
            .padding(16.dp)
    ) {
        Spacer(modifier = Modifier.height(8.dp))
        Text(
            text = movie.title,
        )
        Text(
            text = movie.overview,
        )
        Button(onClick = onMovieSelected) {
            Text("Sélectionner ce film")
        }
    }
}

@Composable
fun SelectedMovieItem(movie: Movie) {

}
