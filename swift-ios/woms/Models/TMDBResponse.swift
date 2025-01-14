//
//  TMDBResponse.swift
//  woms
//
//  Created by Guillaume FINE on 22/11/2023.
//

import Foundation

class TMDBResponse: Codable {
    let page: Int
    let results: [TvShow]
    let total_pages: Int
    let total_results: Int
}
