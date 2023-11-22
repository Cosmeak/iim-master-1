//
//  IndexTvShowsViewModel.swift
//  woms
//
//  Created by Guillaume FINE on 21/11/2023.
//

import Foundation

class IndexTvShowsViewModel: ObservableObject {
    @Published var tvShows: [TvShow]
    @Published var isLoading = false
    var actualPage: Int = 1
    var totalItemsAvailable: Int = 0
    var itemsBeforeEndThreshold = 10
    
    init() {
        self.tvShows = []
    }
    
    func getPopularMovies(page:Int = 1, lang: String = "fr_FR") {
        if (moreItemsCanBeLoad() == false && self.isLoading == true) {
            print("here")
            return
        }
        
        self.isLoading = true
        guard let url = URL(string: "https://api.themoviedb.org/3/movie/popular?page=\(page)&language=\(lang)") else { return print("error url") }
        var request = URLRequest(url: url)
        request.httpMethod = "GET"
        request.setValue("Bearer \(TMDBToken)", forHTTPHeaderField: "Authorization")
        let task = URLSession.shared.dataTask(with: request) { (data, response, error) in
            if error != nil { return print(error as Any) }
            
            guard let data = data else { return print("No data") }
            
            do {
                let decoder = JSONDecoder()
                let decodedResponse = try decoder.decode(TMDBResponse.self, from: data)
                DispatchQueue.main.sync {
                    self.tvShows = self.tvShows + decodedResponse.results
                }
                self.actualPage = decodedResponse.page
                self.totalItemsAvailable = decodedResponse.total_results
            } catch {
                self.isLoading = false
                return print(error as Any)
            }
        }
        task.resume()
        self.isLoading = false
    }
    
    func thresholdMeeting(index: Int) -> Bool {
        return (self.tvShows.count - index) == self.itemsBeforeEndThreshold
    }
    
    private func moreItemsCanBeLoad() -> Bool {
        return self.tvShows.count < self.totalItemsAvailable
    }
}
