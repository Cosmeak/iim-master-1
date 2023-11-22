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
                    NavigationLink(viewModel.tvShows[index].title, destination: ReadTvShowView(tvShow: viewModel.tvShows[index]))
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
