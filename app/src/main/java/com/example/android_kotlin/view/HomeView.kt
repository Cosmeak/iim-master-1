package com.example.android_kotlin.view

import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.size
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.items
import androidx.compose.material3.Button
import androidx.compose.material3.Card
import androidx.compose.material3.CardDefaults
import androidx.compose.material3.ExperimentalMaterial3Api
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Scaffold
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.navigation.NavController
import coil.compose.AsyncImage
import com.example.android_kotlin.model.Movie

@Composable
@OptIn(ExperimentalMaterial3Api::class)
fun HomePage(navController: NavController, movies: List<Movie>) {
    Scaffold { padding ->
        Text (
            text = "Popular movies",
            fontSize = 24.sp,
            fontWeight = FontWeight.Bold,
            modifier = Modifier
                .padding(horizontal = 16.dp)
        )
        LazyColumn(
            verticalArrangement = Arrangement.spacedBy(16.dp),
            horizontalAlignment = Alignment.CenterHorizontally,
            modifier = Modifier
                .padding(16.dp)
                .fillMaxWidth()
                .padding(24.dp)
        ) {
            items(movies) { movie ->
                Card (
                    colors = CardDefaults.cardColors(
                        containerColor = MaterialTheme.colorScheme.surfaceVariant,
                    ),
                    modifier = Modifier
                        .size(width = 400.dp, height = 200.dp)
                ) {
                    Row {
                        AsyncImage (
                            model = "https://image.tmdb.org/t/p/original" + movie.poster_path,
                            contentDescription = null,
                        )
                        Column (modifier = Modifier.padding(8.dp)) {
                            Text(
                                text = movie.title,
                                fontSize = 16.sp,
                                fontWeight = FontWeight.Bold,
                                modifier = Modifier
                                    .padding(start = 4.dp, bottom = 8.dp)
                            )
                            Text(
                                text = movie.overview
                            )
                            Button(onClick = { navController.navigate("movieDetail/${movie.id}") }) {
                                Text("Voir ce film")
                            }
                        }
                    }
                }
            }
        }
    }
}
