//
//  ReadTvShowView.swift
//  woms
//
//  Created by Guillaume FINE on 22/11/2023.
//

import SwiftUI

struct ReadTvShowView: View {
    var tvShow: TvShow
    
    init(tvShow: TvShow) {
        self.tvShow = tvShow
    }
    
    var body: some View {
        ScrollView {
            VStack {
                AsyncImage(url: URL(string: "https://image.tmdb.org/t/p/original/\(tvShow.poster_path)")) { image in
                        image
                            .image?.resizable()
                            .scaledToFit()
                }
                    
                Text(tvShow.title)
                Text(tvShow.release_date)
                Text(tvShow.overview)
            }
        }
    }
}


