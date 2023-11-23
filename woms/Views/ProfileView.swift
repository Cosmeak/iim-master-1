//
//  ProfileView.swift
//  woms
//
//  Created by Guillaume FINE on 23/11/2023.
//

import SwiftUI

struct ProfileView: View {
    @StateObject var viewModel = ProfileViewModel()
    
    var body: some View {
        ZStack {
            if let user = viewModel.user {
                Text(user.username)
            } else if (viewModel.isLoading) {
                ProgressView()
            } else {
                Text("Error on loading")
            }
        }
    }
}

#Preview {
    ProfileView()
}
