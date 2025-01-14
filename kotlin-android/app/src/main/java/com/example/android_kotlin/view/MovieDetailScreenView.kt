package com.example.android_kotlin.view

import android.widget.RatingBar
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.size
import androidx.compose.foundation.layout.width
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.rememberScrollState
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.foundation.verticalScroll
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.outlined.Star
import androidx.compose.material.icons.rounded.Star
import androidx.compose.material3.Icon
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.LaunchedEffect
import androidx.compose.runtime.getValue
import androidx.compose.runtime.livedata.observeAsState
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.draw.paint
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.layout.ContentScale
import androidx.compose.ui.res.stringResource
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.lifecycle.viewmodel.compose.viewModel
import androidx.navigation.NavController
import coil.compose.AsyncImage
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

    val selectedMovie by viewModel.selectedMovie.observeAsState()

    selectedMovie?.let {
        Column (
            modifier = Modifier
                .fillMaxWidth()
                .verticalScroll(rememberScrollState())
        ) {
            AsyncImage(
                model = "https://image.tmdb.org/t/p/original" + it.poster_path,
                contentDescription = it.title,
                modifier = Modifier
                    .fillMaxWidth()
                    .height(220.dp),
                contentScale = ContentScale.Crop
            )

            Spacer(modifier = Modifier.height(16.dp))

            Row (
                modifier = Modifier
                    .fillMaxWidth()
                    .padding(16.dp)
            ){
                Box(
                    modifier = Modifier
                        .width(160.dp)
                        .height(240.dp)
                ) {
                    AsyncImage(
                        model = "https://image.tmdb.org/t/p/original" + it.poster_path,
                        contentDescription = it.title,
                        modifier = Modifier
                            .fillMaxWidth()
                            .clip(RoundedCornerShape(21.dp)),
                        contentScale = ContentScale.Crop
                    )
                }

                Column (
                    modifier = Modifier.fillMaxWidth()
                ) {
                    Text(text = it.title, modifier = Modifier.padding(start = 16.dp), fontSize = 19.sp, fontWeight = FontWeight.SemiBold)

                    Spacer(modifier = Modifier.height(16.dp))

                    Row(
                        modifier = Modifier
                            .padding(start = 16.dp)
                    ) {
                        Row {
                            val filledStars = kotlin.math.floor(it.vote_average).toInt() / 2

                            repeat(filledStars) {
                                Icon(
                                    modifier = Modifier.size(18.dp),
                                    imageVector = Icons.Rounded.Star,
                                    contentDescription = null,
                                    tint = Color.Black
                                )
                            }
                            repeat((5 - filledStars)) {
                                Icon(
                                    modifier = Modifier.size(18.dp),
                                    imageVector = Icons.Outlined.Star,
                                    contentDescription = null,
                                    tint = Color.LightGray
                                )
                            }
                        }

                        Text(
                            modifier = Modifier.padding(start = 4.dp),
                            text = (it.vote_average / 2).toString().take(3),
                            color = Color.LightGray,
                            fontSize = 14.sp,
                            maxLines = 1,
                        )
                    }

                    Spacer(modifier = Modifier.height(12.dp))

                    Text(
                        modifier = Modifier.padding(start = 16.dp),
                        text = "Language: " +  it.original_language
                    )

                    Spacer(modifier = Modifier.height(10.dp))

                    Text(
                        modifier = Modifier.padding(start = 16.dp),
                        text = "Release date: " + it.release_date
                    )

                    Spacer(modifier = Modifier.height(10.dp))

                    Text(
                        modifier = Modifier.padding(start = 16.dp),
                        text = it.vote_count.toString() + " votes"
                    )
                }
            }

            Spacer(modifier = Modifier.height(24.dp))

            Text(
                modifier = Modifier.padding(start = 16.dp),
                text = "Overview",
                fontSize = 19.sp,
                fontWeight = FontWeight.SemiBold
            )

            Spacer(modifier = Modifier.height(8.dp))

            Text(
                modifier = Modifier.padding(start = 16.dp),
                text = it.overview,
                fontSize = 16.sp,
            )
        }
    } ?: run {
        // Si inaccessible
    }
}
