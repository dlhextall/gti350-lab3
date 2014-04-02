//
//  HomeViewController.h
//  phtshr-ios
//
//  Created by David Lafrance on 2014-03-28.
//  Copyright (c) 2014 David Lafrance. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface HomeViewController : UIViewController <UICollectionViewDataSource, UICollectionViewDelegate>

@property (nonatomic, strong) NSMutableArray *photoFeed;
@property (strong, nonatomic) IBOutlet UICollectionView *collectionViewPhotoFeed;
@property (strong, nonatomic) IBOutlet UISearchBar *searchBarView;

@end
