package com.example.android_kotlin.view

import androidx.compose.foundation.background
import androidx.compose.foundation.clickable
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.PaddingValues
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.size
import androidx.compose.foundation.layout.width
import androidx.compose.foundation.layout.wrapContentHeight
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.grid.GridCells
import androidx.compose.foundation.lazy.grid.LazyVerticalGrid
import androidx.compose.foundation.lazy.items
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.outlined.Star
import androidx.compose.material.icons.rounded.Star
import androidx.compose.material3.Button
import androidx.compose.material3.Card
import androidx.compose.material3.CardDefaults
import androidx.compose.material3.CenterAlignedTopAppBar
import androidx.compose.material3.CircularProgressIndicator
import androidx.compose.material3.ExperimentalMaterial3Api
import androidx.compose.material3.Icon
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Scaffold
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.navigation.NavController
import coil.compose.AsyncImage
import com.example.android_kotlin.model.Movie

@Composable
@OptIn(ExperimentalMaterial3Api::class)
fun HomePage(navController: NavController, movies: List<Movie>) {
    Scaffold (
        topBar = {
            CenterAlignedTopAppBar(title = {
                Text (
                    text = "Popular movies",
                    fontSize = 24.sp,
                    fontWeight = FontWeight.Bold,
                )
            })

        }
    ) { padding ->
        if (movies.isEmpty()) {
            Box (
                modifier = Modifier.fillMaxSize().padding(padding),
                contentAlignment = Alignment.Center,
            ) {
                CircularProgressIndicator()
            }
        } else {
            LazyVerticalGrid(
                columns = GridCells.Fixed(2),
                modifier = Modifier.fillMaxSize().padding(padding),
                contentPadding = PaddingValues(horizontal = 8.dp, vertical = 4.dp)
            ) {
                items(movies.size) { index ->
                    val movie = movies[index]
                    Column (
                        modifier = Modifier
                            .wrapContentHeight()
                            .width(200.dp)
                            .padding(8.dp)
                            .clip(RoundedCornerShape(28.dp))
                            .background(Color.DarkGray)
                            // .clickable { navController.navigate() }
                    ) {
                        AsyncImage(
                            model = "https://image.tmdb.org/t/p/original" + movie.poster_path,
                            contentDescription = movie.title,
                            modifier = Modifier
                                .fillMaxWidth()
                                .padding(6.dp)
                                .height(250.dp)
                                .clip(RoundedCornerShape(22.dp))
                        )

                        Spacer(modifier = Modifier.height(6.dp))

                        Text(
                            modifier = Modifier.padding(start = 16.dp, end = 8.dp),
                            text = movie.title,
                            color = Color.White,
                            fontSize = 15.sp,
                            maxLines = 1
                        )

                        Row (
                            modifier = Modifier
                                .fillMaxWidth()
                                .padding(start = 16.dp, bottom = 12.dp, top = 4.dp)
                        ){

                            Row {
                                val filledStars = kotlin.math.floor(movie.vote_average).toInt() / 2
                                val halfStar = !(movie.vote_average.rem(1).equals(0.0))

                                repeat(filledStars) {
                                    Icon(
                                        modifier = Modifier.size(18.dp),
                                        imageVector = Icons.Rounded.Star,
                                        contentDescription = null,
                                        tint = Color.Yellow
                                    )
                                }
                                if (halfStar) {
                                    Icon(
                                        modifier = Modifier.size(18.dp),
                                        imageVector = Icons.Rounded.Star,
                                        contentDescription = null,
                                        tint = Color.Yellow
                                    )
                                }
                                repeat((5 - filledStars)) {
                                    Icon(
                                        modifier = Modifier.size(18.dp),
                                        imageVector = Icons.Rounded.Star,
                                        contentDescription = null,
                                        tint = Color.LightGray
                                    )
                                }
                            }

                            Text(
                                modifier = Modifier.padding(start = 4.dp),
                                text = (movie.vote_average / 2).toString().take(3),
                                color = Color.LightGray,
                                fontSize = 14.sp,
                                maxLines = 1,
                            )
                        }

                    }

                    Spacer(modifier = Modifier.height(16.dp))
                }
            }
        }
    }
}
