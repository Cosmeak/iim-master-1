//
//  IndexTvShowsView.swift
//  woms
//
//  Created by Guillaume FINE on 20/11/2023.
//

import SwiftUI

struct IndexTvShowsView: View {
    @StateObject var viewModel: IndexTvShowsViewModel = IndexTvShowsViewModel()
    
    var body: some View {
        ZStack(content: {
            List {
                ForEach (viewModel.tvShows.indices, id: \.self) { index in
                    let show = viewModel.tvShows[index]
                    NavigationLink(destination: ReadTvShowView(tvShow: show)) {
                        HStack {
                            AsyncImage(url: URL(string: "https://image.tmdb.org/t/p/original/\(show.poster_path)")) { image in
                                    image
                                        .image?.resizable()
                                        .scaledToFit()
                            }.padding(EdgeInsets(top: 0, leading: 0, bottom: 0, trailing: 8))
                            Text(show.title)
                                .font(.headline)
                                .foregroundStyle(.background)
                                .padding(EdgeInsets(top: 25, leading: 5, bottom: 25, trailing: 5))
                        }
                    }
                        .frame(height: 64)
                        .listRowSeparator(.hidden)
                        .listStyle(.plain)
                        .listRowBackground(
                            RoundedRectangle(cornerRadius: 5)
                                .background(.clear)
                                .foregroundColor(.primary)
                                .frame(height: 64)
                        )
                        .onAppear(perform: {
                            if (viewModel.thresholdMeeting(index: index as Int)) {
                                viewModel.getPopularMovies(page: viewModel.actualPage + 1)
                            }
                        })
                }
            }
        })
        .onAppear(perform: {
            viewModel.getPopularMovies()
        })
    }
}

#Preview {
    IndexTvShowsView()
}
